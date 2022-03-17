@extends('layouts.main')
<style>
    .header-container{
        background: #0149AB;
        padding: 10 0px;
        box-shadow: 2px 2px 2px dimgrey;
    }
    .burgerMenu {
        width: 35px;
        height: 5px;
        background-color: #fff;
        margin: 6px 0;
        border-radius: 5px;
    }
    .name{
        font-size: 13px;
        margin-left: -53px;
        color: white;
        text-align: center;
    }
    .profile{
        background: #fff;
        border-radius: 100%;
        padding: 20px;
        width: 2em;
        height: 2em;
        /* margin-left: -15px;
        margin-right: 15px; */
    }

    #profile-and-name {
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
    }
    #burger-cont {
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    #profile-cont {
        display: flex;
        align-self: center;
        justify-content: flex-end;
    }

</style>
<header>
    <div class="header-container">
        <div class="container">
            <div class="row">
                <div class="col-9" id="burger-cont">
                    <div>
                        <div class="burgerMenu"></div>
                        <div class="burgerMenu"></div>
                        <div class="burgerMenu"></div>
                    </div>
                </div>
                <div class="col-3" id="profile-cont">
                    <div id="profile-and-name">
                        <div style="height: 53%;">
                            <p class="name">John Doe</p>
                        </div>
                        <div class="profile"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
