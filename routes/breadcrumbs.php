<?php

// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard.admin'));
});

// Home > Profile
Breadcrumbs::for('profile', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Profile', route('profile.index'));
});

// Home > Setting
Breadcrumbs::for('setting', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Setting', "#");
});


// Home > Setting > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('setting');
    $trail->push($category, route('role.index'));
});

// Home > Setting > Kursi 
Breadcrumbs::for('kursi', function ($trail) {
    $trail->parent('setting');
    $trail->push('Kursi', route('kursi.index'));
});

// Home > Setting > Kursi > [studio]
Breadcrumbs::for('studio', function ($trail, $category) {
    $trail->parent('kursi');
    $trail->push($category, route('kursi.index'));
});

// // Home > Setting
// Breadcrumbs::for('setting', function ($trail) {
//     $trail->parent('dashboard');
//     $trail->push('Blog', route('blog'));
// });

// // Home > Blog > [Category]
// Breadcrumbs::for('category', function ($trail, $category) {
//     $trail->parent('setting');
//     $trail->push($category->title, route('role.index'));
// });

// // Home > Blog > [Category] > [Post]
// Breadcrumbs::for('post', function ($trail, $post) {
//     $trail->parent('category', $post->category);
//     $trail->push($post->title, route('post', $post->id));
// });
