<?php

    function authMiddleware(){
        return auth();
    }

    function adminMiddleware(){
        return auth() && auth()['admin'];
    }