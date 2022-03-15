@extends('layouts.main')
<style>
    .header-container{
        background: #0149AB;
        padding: 10px;
        padding-left: 15px;
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
        margin-left: -20px;
        color: white;
        text-align: center;
        margin-top: 10px;
    }
    .profile{
        background: #fff;
        border-radius: 100%;
        padding: 20px;
        margin-left: -15px;
        margin-right: 15px;
    }
</style>
<header>
    <div class="container header-container">
        <div class="row">
            <div class="col-8">
                <div class="burgerMenu"></div>
                <div class="burgerMenu"></div>
                <div class="burgerMenu"></div>
            </div>
            <div class="col-2">
                <p class="name">John Doe</p>
            </div>
            <div class="col-2">
                <div class="profile">
                </div>
            </div>
        </div>
    </div>
</header>
