<template>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="navbar-right">
                <img src="https://s1.vnecdn.net/vnexpress/restruct/i/v654/v2_2019/pc/graphics/logo.svg"
                alt="VnExpress - Bao tieng Viet nhieu nguoi xem nhat">
                <div class="line-vertical"></div>
                <span class="timenow">Thứ tư, 5/10/2022</span>
            </div>

            <div class="navbar-left">
                <button class="btnWrapper">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p> Mới nhất</p>
                </button>
                <button class="btnWrapper">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                    <p> International</p>
                </button>
                <div class="line-vertical"></div>
                <div class="searchWrapper">
                    <input placeholder="Tìm kiếm"/>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <div class="btnWrapper login">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <p> Đăng nhập</p>
                </div>
            </div>
        </div>
        
       <div class="line-horizontal"></div>

       <div class="menu">
            <div class="btnHome">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            </div>  

            <div class="dropdown">
                <button class="btnMenu" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Thời sự
                </button>
                <ul class="dropdown-menu menu-item" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btnMenu" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Thời sự
                </button>
                <ul class="dropdown-menu menu-item" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btnMenu" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Thời sự
                </button>
                <ul class="dropdown-menu menu-item" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>

       </div>
       <div class="line-horizontal"></div>
    </nav>
    

</template>

<script>
export default {
    name: 'Navbar'
}
</script>


<style>
    .navbar{
        background-color: white;
    }
    .navbar-container{
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 50px;
        max-width: 1400px;
        width: 80%;
        margin: auto;
    }
    .navbar-right{
        display: flex;
        align-items: center;
    }
    .navbar-right img{
        margin-right: 20px;
        width: 128px;
    }
    .line-vertical{
        height: 30px;
        border: 0.5px solid #e5e5e5;
    }
    .timenow{
        color: #757575;
        margin-left: 20px;
    }
    .navbar-left{
        display: flex;
        align-items: center;
    }
    .btnWrapper{
        display: flex;
        align-items: center;
        color: #757575;
        border: 1px solid #e5e5e5;
        border-radius: 5px;
        padding: 0 10px;
        height: 32px;
        font-size: 12px;
        margin-right: 20px;
    }
    .btnWrapper:hover{
        background-color: #f2f2f2;
        cursor: pointer;
    }
    .searchWrapper{
        display: flex;
        align-items: center;
        border: 1px solid #e5e5e5;
        border-radius: 16px;
        font-size: 12px;
        color: #757575;
        margin-left: 20px;
        padding: 0 5px;
        width: 160px;
        height: 32px;
    }
    .searchWrapper input{
        border: none;
        width: 80%;
        padding: 0 0 0 5px;
    }
    .searchWrapper svg{
        padding: 0 5px 0 5px;
    }
    .login{
        border: none;
    }
    .login:hover{
        background-color: white;
        color: #087cce;
    }
    .line-horizontal{
        width: 100%;
        border: 0.5px solid #e5e5e5;
    }

    .menu{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 50px;
        max-width: 1400px;
        width: 80%;
        margin: auto;

    }
    .btnHome{
        background-color: #e5e5e5;
        border-radius: 50%;
        padding: 5px;
    }

    .dropdown{
        margin-left: 10px !important
    }
    .dropdown:hover{
        color: #b52759;
    }
    .menu-item{
        margin-top: 10px !important
    }
</style>