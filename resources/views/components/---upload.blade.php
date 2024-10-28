@props(['maxfiles','maxfilessize','filename','url','filetype','buttontext'])
@php
if(!isset($buttontext)): $buttontext = "رفع الصور"; endif;
if(!isset($maxfiles)): $maxfiles = 10; endif;
$filetype = "images";
if($filetype =="images"){
    $icon = "<i class='fa fa-image'></i>";
    $allowed = ".jpeg,.jpg,.png,.gif";
}elseif($filetype =="documents"){
    $icon = "<i class='fa fa-file'></i>";
    $allowed = ".doc,.docx,.xls,.xlsx,.ppt,.pptx,.pdf";
}elseif($filetype =="all"){
    $icon = "<i class='fa fa-file'></i>";
    $allowed = "*";
}else{
    $icon = "<i class='fa fa-image'></i>";
    $allowed = ".jpeg,.jpg,.png,.gif";
}
if(!isset($url) || empty($url)): $url = '/upload'; endif;
if(!isset($maxfilessize)): $maxfilessize = 12; endif;
if(!isset($filename) || empty($filename)): $filename = 'file'; endif;

@endphp
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.css" integrity="sha512-7uSoC3grlnRktCWoO4LjHMjotq8gf9XDFQerPuaph+cqR7JC9XKGdvN+UwZMC14aAaBDItdRj3DcSDs4kMWUgg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<form class="form" action="@php echo $url @endphp" method="POST"  enctype="multipart/form-data">
            <!--begin::Dropzone-->
            <div class="rtl dropzone dropzone-queue mb-2" id="@php echo $filename; @endphp">
                <!--begin::Controls-->
                <div class="dropzone-panel mb-lg-0 mb-2">
                    <a class="dropzone-select btn btn-sm btn-primary me-2"><?php echo $icon.' '.$buttontext; ?></a>
                </div>
                <!--end::Controls-->

                <!--begin::Items-->
                <div class="dropzone-items wm-200px">
                    <div class="dropzone-item" style="display:none">
                        <!--begin::File-->
                        <div class="dropzone-file">
                            <div class="dropzone-filename" title="some_image_file_name.jpg">
                                <span data-dz-name>some_image_file_name.jpg</span>
                                <strong>(<span data-dz-size>0kb</span>)</strong>
                            </div>

                            <div class="dropzone-error" data-dz-errormessage></div>
                        </div>
                        <!--end::File-->

                        <!--begin::Progress-->
                        <div class="dropzone-progress">
                            <div class="progress">
                                <div
                                    class="progress-bar bg-primary"
                                    role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress>
                                </div>
                            </div>
                        </div>
                        <!--end::Progress-->

                        <!--begin::Toolbar-->
                        <div class="dropzone-toolbar">
                            <span class="dropzone-delete" data-dz-remove><i class="bi bi-x fs-1"></i></span>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                </div>
                <!--end::Items-->
            </div>
            <!--end::Dropzone-->

            <!--begin::Hint-->
            <span class="form-text text-muted"></span>
            <!--end::Hint-->
<input type="hidden" name="<?php echo $filename; ?>DB" id="<?php echo $filename; ?>DB" value="" placeholder="<?php echo $filename; ?>DB" />
</form>
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
const id = "#<?php echo $filename; ?>";
const dropzone = document.querySelector(id);

// set the preview element template
var previewNode = dropzone.querySelector(".dropzone-item");
previewNode.id = "";
var previewTemplate = previewNode.parentNode.innerHTML;
previewNode.parentNode.removeChild(previewNode);

var myDropzone = new Dropzone(id, { // Make the whole body a dropzone
    url: "<?php echo $url; ?>", // Set the url for your upload script location
    acceptedFiles: "<?php echo $allowed; ?>",
    paramName: "<?php echo $filename; ?>",
    parallelUploads: <?php echo $maxfiles; ?>,
    maxFiles: <?php echo $maxfiles; ?>,
    headers :{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  },
    maxFilesize: <?php echo $maxfilessize; ?>, // Max filesize in MB
    previewTemplate: previewTemplate,
    previewsContainer: id + " .dropzone-items", // Define the container to display the previews
    clickable: id + " .dropzone-select" // Define the element that should be used as click trigger to select files.
});

myDropzone.on("addedfile", function (file) {
    // Hookup the start button
    const dropzoneItems = dropzone.querySelectorAll('.dropzone-item');
    dropzoneItems.forEach(dropzoneItem => {
        dropzoneItem.style.display = '';
    });
});

// Update the total progress bar
myDropzone.on("totaluploadprogress", function (progress) {
    const progressBars = dropzone.querySelectorAll('.progress-bar');
    progressBars.forEach(progressBar => {
        progressBar.style.width = progress + "%";
    });
});

myDropzone.on("sending", function (file) {
    // Show the total progress bar when upload starts
    const progressBars = dropzone.querySelectorAll('.progress-bar');
    progressBars.forEach(progressBar => {
        progressBar.style.opacity = "1";
    });
});

// Hide the total progress bar when nothing"s uploading anymore
myDropzone.on("complete", function (progress) {
    $('#<?php echo $filename; ?>DB').val(progress.xhr.response);
    const progressBars = dropzone.querySelectorAll('.dz-complete');

    setTimeout(function () {
        progressBars.forEach(progressBar => {
            progressBar.querySelector('.progress-bar').style.opacity = "0";
            progressBar.querySelector('.progress').style.opacity = "0";
        });
    }, 300);
});
</script>
@endsection
