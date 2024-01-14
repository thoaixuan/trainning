
import { getStorage } from '../main.js';

getStorage().then((storage) => {
    const dataFile = storage.storage.root.children;
    const MegaFile = storage.MEGAFile;
    console.log(MegaFile);

    const listFileCloud = $("#listFileCloud");
    // render folder
    var filterFolder = dataFile.filter(file => file.directory === true);
    filterFolder.forEach((item, index) => {
        var listItem = `<li class="col list-inline click" data-id="${item.nodeId}" id="view-folder">
            <div class="card custom-card">
                <img id="thumbnail-file" src="${window.location.origin+'/themes/assets/images/web/folder.png'}" class="card-img-top">
                <div class="card-body">
                    <h6 id="name-file-${index}" class="card-title fw-semibold">${item.name || ''}</h6>
                </div>
            </div>
        </li>`;
        listFileCloud.append(listItem);

        // view Folder
        $(document).on("click", "#view-folder", function () {
            var id = $('#view-folder').data('id');
            console.log(id);
            window.location.href = '/my-folder/'+id;
        })

        const listFileChild = $("#listFileChild");
        var filterChild = item.children;
        filterChild.forEach(async(item, index) => {
            var getUrl = await(item.link());
            // const fileFromUrl = MegaFile.fromURL(getUrl);
            const listChildItem = `<li class="col list-inline click" >
                <div class="card custom-card" data-url="${getUrl}" data-id="${item.nodeId}" id="view-tactvu">
                    <img id="thumbnail-file-${index}" src="${item.thumbnailUrl || ''}" class="card-img-top">
                    <div class="card-body">
                        <h6 id="name-file-${index}" class="card-title fw-semibold">${item.name || ''}</h6>
                    </div>
                </div>
            </li>`;
            listFileChild.append(listChildItem);
        })

    });

    // render file
    var filterFiles = dataFile.filter(file => file.directory === false);
        filterFiles.forEach(async(item, index) => {
            var getUrl = await(item.link());

            var listItem = `<li class="col list-inline click">
                <div class="card custom-card" data-url="${getUrl}" data-id="${item.nodeId}" id="view-tactvu">
                    <img id="thumbnail-file-${index}" src="${item.thumbnailUrl || ''}" class="card-img-top">
                    <div class="card-body">
                        <h6 id="name-file-${index}" class="card-title fw-semibold">${item.name || ''}</h6>
                    </div>
                </div>
            </li>`;
        listFileCloud.append(listItem);
    })

    // Add tacvu
    var isTacvu = false;
    $(document).on("click keyup", "#view-tactvu", function (event) {
        var id = $(this).data('id');
        var url = $(this).data('url');
        console.log(url);
        isTacvu = !isTacvu;
        if (isTacvu) {
            $("#tacvu").fadeIn(200);
            $(".button-edit").attr("value", id);
            $(".button-edit").attr("data-url", url);
            $(".button-edit").attr("id", "download");
            $(".button-delete").attr("value", id);
            $(".button-delete").attr("id", "delete");

        } else {
            $("#tacvu").fadeOut(200);
        }
    });

    $(document).on("click", "#download", async function (event) {
        var url = $('#download').data('url');
        const fileFromUrl = MegaFile.fromURL(url);
        fileFromUrl.loadAttributes().then(() => {
            return fileFromUrl.downloadBuffer();
        })
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Lỗi khi tải về tệp:', error);
        });
    })

    $(document).on("click", "#delete", async function (event) {
        try {
            await file.delete();
            toastr.success('Xóa file thành công');
        } catch (error) {
            console.error("Error deleting file:", error);
        }

    })


}).catch((error) => {
    toastr.error(error);
});


