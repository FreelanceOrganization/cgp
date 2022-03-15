@extends('layouts.main')
<style>
    .header-container{
        background: #0149AB;
        padding: 10px;
        padding-left: 15px;
    }
    .burgerMenu {
        width: 35px;
        height: 5px;
        background-color: #fff;
        margin: 6px 0;
        border-radius: 5px;
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
                <p>John Doe</p>
            </div>
            <div class="col-2">
                <div class="profile">
                    profile
                </div>
            </div>
        </div>
    </div>
</header>
