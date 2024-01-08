(function () {
    'use strict'

    /* dropzone */
    // let myDropzone = new Dropzone(".dropzone");
    //     myDropzone.on("addedfile", file => {
    // });

    /* filepond */
    FilePond.registerPlugin(
        FilePondPluginImageExifOrientation,
        FilePondPluginFileValidateSize,
        FilePondPluginFileEncode,
        FilePondPluginImageEdit,
        FilePondPluginFileValidateType,
        FilePondPluginImageCrop,
        FilePondPluginImageResize,
        FilePondPluginImageTransform
    );

    /* multiple upload */
    const MultipleElement = document.querySelector('.multiple-filepond');
    FilePond.create(MultipleElement,{
        labelIdle: `Click chọn hoặc kéo thả folder, file tại đây <p class="fs-11 m-0">(PDF,EXCEL,WORD,IMAGE,ZIP)</p>`,
    });

    /* single upload */
    FilePond.create(
        document.querySelector('.single-fileupload'),
        {
            labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
            imagePreviewHeight: 170,
            imageCropAspectRatio: '1:1',
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            stylePanelLayout: 'compact circle',
            styleLoadIndicatorPosition: 'center bottom',
            styleButtonRemoveItemPosition: 'center bottom'
        }
    );

})();
