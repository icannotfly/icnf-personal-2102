<!--
Copyright 2021 icannotfly

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
-->



<!doctype html>
<html class="h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        <?php
        if( !is_front_page() ) {
            if( is_singular() ) {
                the_title();
            } else if( is_home() ) {
                echo("All Posts");
            } else {
                single_term_title();
            }
            echo(" - ");
        }
        bloginfo("name");
        ?>
    </title>

    <?php wp_head(); ?>
</head>



<body class="d-flex flex-column h-100">

    <header>
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark navbar-main-menu">
            <div class="container">
                <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><?php bloginfo("name"); ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMainToggle" aria-controls="navbarMainToggle" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarMainToggle">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'Main Menu',
                            'menu' => 'Main Menu',
                            'menu_class' => 'navbar-nav ms-auto mb-2 mb-lg-0',
                            'list_item_class' => 'nav-item',
                            'link_class' => 'nav-link',
                            'container' => 'null'
                        )
                    );
                    ?>
                </div>
            </div>
        </nav>
    </header>
