
import { getStorage } from '../main.js';

getStorage().then((storage) => {
    let dataFile = storage.storage.root.children;
    // console.log(dataFile);
    let MegaFile = storage.MEGAFile;
    var itemArray  = [];
    const listFileCloud = $(".listFileCloud");
    // Hàm hiển thị danh sách file và folder
    function renderFileList(files, container) {
        container.html('');
         files.forEach(async (item, index) => {
        if (item.directory === true) {
            var listItem = `<li class="col list-inline click" data-id="${item.nodeId}" id="view-folder">
                   <div class="card custom-card">
                       <img id="thumbnail-file" src="${window.location.origin+'/themes/assets/images/web/folder.png'}" class="card-img-top">
                       <div class="card-body">
                            <h6 id="name-file-${index}" class="card-title fw-semibold">${item.name || ''}</h6>
                        </div>
                     </div>
               </li>`;
            container.append(listItem);

            // Tạo một container mới cho thư mục con
            const childContainer = $(`#listFileChild-${item.nodeId}`);
            $('#listFileChild').append(childContainer);
            renderFileList(item.children, childContainer);
        } else {
            const setItemFile = item;
            itemArray.push(setItemFile);
            const getUrl = await item.link();
            var listItem = `<li class="col list-inline click">
                <div class="card custom-card" data-name="${item.name}" data-url="${getUrl}" data-id="${item.nodeId}" id="view-tactvu">
                    <img id="thumbnail-file-${index}" src="${item.thumbnailUrl || ''}" class="card-img-top">
                    <div class="card-body">
                        <h6 id="name-file-${index}" class="card-title fw-semibold">${item.name || ''}</h6>
                    </div>
                </div>
            </li>`;
            container.append(listItem);
        }
    });
    }

    var allFiles = dataFile;
    renderFileList(allFiles, listFileCloud);

    // view Folder
    $(document).on("click", "#view-folder", function () {
        var id = $(this).data('id');
        window.location.href = '/my-folder/' + id;
    });

    // Add tacvu
    var isTacvu = false;
    $(document).on("click keyup", "#view-tactvu", function (event) {
        var id = $(this).data('id');
        var url = $(this).data('url');
        var name = $(this).data('name');
        isTacvu = !isTacvu;
        if (isTacvu) {
            $("#tacvu").fadeIn(200);
            $(".button-edit").attr("value", id);
            $(".button-edit").attr("data-name", name);
            $(".button-edit").attr("id", "download");
            $(".button-delete").attr("value", id);
            $(".button-delete").attr("id", "delete");

        } else {
            $("#tacvu").fadeOut(200);
        }
    });

    $(document).on("click", "#download", async function (event) {
        var nameFile = $(this).data('name');
        var selectedItem = itemArray.find(item => item.name === nameFile);
        const api =  selectedItem.api;
        const downloadId = selectedItem.shareId;
        const key = selectedItem.key;
        const fileFromObject = new MegaFile({ downloadId, key, api })
        const downloadStream = await fileFromObject.download();
        const chunks = [];
        downloadStream.on('data', (chunk) => {
            chunks.push(chunk);
        });
        downloadStream.on('end', () => {
            const blob = new Blob(chunks);
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = nameFile;
            link.click();
        });
        downloadStream.on('error', (error) => {
            console.error('Lỗi khi tải về tệp:', error);
        });
    });

    $(document).on("click", "#delete", async function (event) {
        try {
            var nodeId = $(this).val();
            var selectedItem = itemArray.find(item => item.nodeId === nodeId);
            await selectedItem.delete();
            toastr.success('Xóa file thành công');
            window.location.reload();
        } catch (error) {
            console.error("Xóa không thành công:", error);
        }

    })

}).catch((error) => {
    toastr.error(error);
});


