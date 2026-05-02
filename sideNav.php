<div id="sideNav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <a href="products.php">Dresses</a>
    <a href="#">Collections</a>
    <a href="aboutus.php">About Bellisse</a>
    <a href="contactus.php">Contact</a>
</div>

<script>
    function openNav() {
        document.getElementById("sideNav").style.width = "260px";
        document.getElementById("main").style.marginLeft = "260px";
    }

    function closeNav() {
        document.getElementById("sideNav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>

<style>
    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1000; 
        top: 0;
        left: 0;
        background-color: #F3E8E6;
        overflow-x: hidden;
        transition: 0.4s;
        padding-top: 70px;
        border-right: 1px solid #E5DAD6;
    }

    .sidenav a {
        padding: 12px 32px;
        text-decoration: none;
        font-size: 18px;
        color: #2C2C2C;
        display: block;
        transition: 0.3s;
        letter-spacing: 1px;
    }

    .sidenav a:hover { 
        color: #D4A5A5;
        padding-left: 40px;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 15px;
        right: 25px;
        font-size: 32px;
        color: #2C2C2C;
        cursor: pointer;
    }

    .sidenav .closebtn:hover {
        color: #D4A5A5;
    }
</style>