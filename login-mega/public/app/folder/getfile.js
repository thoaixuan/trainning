
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
                var listItem = `<li class="col list-inline click" data-id="${item.nodeId}" id="view-folder-${item.nodeId}">
                       <div class="card custom-card">
                           <img id="thumbnail-file" src="${window.location.origin+'/themes/assets/images/web/folder.png'}" class="card-img-top">
                           <div class="card-body">
                                <h6 id="name-file-${index}" class="card-title fw-semibold">${item.name || ''}</h6>
                            </div>
                         </div>
                   </li>`;
                container.append(listItem);

            // Tạo một container mới cho thư mục con
            const childContainer = $(`<ul class="list-inline" id="listFileChild-${item.nodeId}"></ul>`);
            container.append(childContainer);
            renderFileList(item.children, childContainer);
            } else {
                const setItemFile = item;
                itemArray.push(setItemFile);
                const getUrl = await item.link();
                const listItem = `<li class="col list-inline click">
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
    const filterFolder = dataFile.filter(file => file.directory === true);
    renderFileList(filterFolder, listFileCloud);

    const filterFiles = dataFile.filter(file => file.directory === false);
    renderFileList(filterFiles, listFileCloud);



    // render folder
    // var filterFolder = dataFile.filter(file => file.directory === true);
    // filterFolder.forEach((item, index) => {
    //     var listItem = `<li class="col list-inline click" data-id="${item.nodeId}" id="view-folder">
    //         <div class="card custom-card">
    //             <img id="thumbnail-file" src="${window.location.origin+'/themes/assets/images/web/folder.png'}" class="card-img-top">
    //             <div class="card-body">
    //                 <h6 id="name-file-${index}" class="card-title fw-semibold">${item.name || ''}</h6>
    //             </div>
    //         </div>
    //     </li>`;
    //     listFileCloud.append(listItem);

    //     const listFileChild = $("#listFileChild");
    //     var filterChild = item.children;
    //     var filterFolder = filterChild.filter(file => file.directory === true);
    //     filterFolder.forEach((item, index) => {
    //         var listItem = `<li class="col list-inline click" data-id="${item.nodeId}" id="view-folder">
    //             <div class="card custom-card">
    //                 <img id="thumbnail-file" src="${window.location.origin+'/themes/assets/images/web/folder.png'}" class="card-img-top">
    //                 <div class="card-body">
    //                     <h6 id="name-file-${index}" class="card-title fw-semibold">${item.name || ''}</h6>
    //                 </div>
    //             </div>
    //         </li>`;
    //         listFileCloud.append(listItem)
    //     })
    //     var filterFiles = filterChild.filter(file => file.directory === false);
    //     filterFiles.forEach(async(item, index) => {
    //         var setItemFile = item;
    //         itemArray.push(setItemFile);
    //         var getUrl = await(item.link());
    //         const listChildItem = `<li class="col list-inline click" >
    //             <div class="card custom-card" data-name="${item.name}" data-url="${getUrl}" data-id="${item.nodeId}" id="view-tactvu">
    //                 <img id="thumbnail-file-${index}" src="${item.thumbnailUrl || ''}" class="card-img-top">
    //                 <div class="card-body">
    //                     <h6 id="name-file-${index}" class="card-title fw-semibold">${item.name || ''}</h6>
    //                 </div>
    //             </div>
    //         </li>`;
    //         listFileChild.append(listChildItem);
    //     })

    // });

    // render file
    // var filterFiles = dataFile.filter(file => file.directory === false);
    // filterFiles.forEach(async(item, index) => {
    //     var setItemFile = item;
    //     itemArray.push(setItemFile);
    //     var getUrl = await(item.link());
    //     var listItem = `<li class="col list-inline click">
    //         <div class="card custom-card" data-name="${item.name}" data-url="${getUrl}" data-id="${item.nodeId}" id="view-tactvu">
    //             <img id="thumbnail-file-${index}" src="${item.thumbnailUrl || ''}" class="card-img-top">
    //             <div class="card-body">
    //                 <h6 id="name-file-${index}" class="card-title fw-semibold">${item.name || ''}</h6>
    //             </div>
    //         </div>
    //     </li>`;
    //     listFileCloud.append(listItem);
    // })

    // view Folder
    $(document).on("click", "#view-folder", function () {
        var id = $(this).data('id');
        window.location.href = '/my-folder/'+id;
    })

    // Add tacvu
    var isTacvu = false;
    $(document).on("click keyup", "#view-tactvu", function (event) {
        var id = $(this).data('id');
        var url = $(this).data('url');
        var name = $(this).data('name');
        isTacvu = !isTacvu;
        if (isTacvu) {
            $("#tacvu").fadeIn(200);
            $(".button-edit").attr("value", name);
            $(".button-edit").attr("data-url", url);
            $(".button-edit").attr("id", "download");
            $(".button-delete").attr("value", id);
            $(".button-delete").attr("id", "delete");

        } else {
            $("#tacvu").fadeOut(200);
        }
    });

    $(document).on("click", "#download", async function (event) {
        var nameFile = $(this).val();
        var url = $('#download').data('url');
        const fileFromUrl = MegaFile.fromURL(url);
        const writeStream = fs.createWriteStream(nameFile);
        fileFromUrl.loadAttributes().then(() => {
            const downloadStream = fileFromUrl.download();
            downloadStream.pipe(writeStream);
            downloadStream.on('end', () => {
                console.log('Tải về và lưu thành công.');
            });

            downloadStream.on('error', (error) => {
                console.error('Lỗi khi tải về tệp:', error);
            });
        });
    })

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


