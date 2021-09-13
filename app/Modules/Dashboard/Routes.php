<?php
//Dashboard routes
use Illuminate\Support\Facades\Route;

Route::group(['module' => 'dashboard', 'middleware' => 'web', 'namespace' => "App\Modules\Dashboard\Controllers"], function () {

    Route::get("error/login.html", ["as" => "login", "uses" => "Errorcode@index"]);

    Route::group(["prefix" => "dashboard"], function () {
        //login
        Route::get("login", ["as" => "admin.login", "uses" => "Authentication@login"]);
        Route::post("login", ["as" => "admin.login_request", "uses" => "Authentication@login_request"]);
        Route::get("logout", ["as" => "admin.logout", "uses" => "Authentication@logout"]);
        Route::get("create", ["as" => "admin.create", "uses" => "Authentication@create"]);

         Route::group(['middleware' => ['auth:admin']], function () {
            Route::get("/access", ["as" => "RolePermission.access", "uses" => "RolePermission@access"]);
            //Dashboard
            Route::get("/", ["as" => "admin.dashboard.index", "uses" => "Dashboard@index"]);

            Route::group(["prefix" => "rules"], function() {
                Route::get("/", ["as" => "admin.rules", "uses" => "Rules@index"]);
                Route::get("add", ["as" => "admin.rules.add", "uses" => "Rules@add"]);
                Route::post("add", ["as" => "admin.rules.add", "uses" => "Rules@postAdd"]);
                Route::get("edit", ["as" => "admin.rules.edit", "uses" => "Rules@edit"]);
                Route::post("edit", ["as" => "admin.rules.eidt", "uses" => "Rules@postEdit"]);
            });

            //users
            Route::group(["prefix" => "users"], function() {
                Route::get("/", ["as" => "admin.users", "uses" => "Users@index"]);
                Route::post("/", ["as" => "admin.users", "uses" => "Users@postIndex"]);
                // Route::get("add", ["as" => "admin.getAdd", "uses" => "Users@add"]);
                // Route::post("add", ["as" => "admin.postAdd", "uses" => "Users@postAdd"]);
                // Route::get("edit", ["as" => "admin.users.Edit", "uses" => "Users@edit"]);
                // Route::post("edit", ["as" => "admin.users.Eidt", "uses" => "Users@postEdit"]);
                // Route::get("edit/{id}", ["as" => "admin.users.edit", "uses" => "Users@edit"]);
                // Route::post("edit/{id}", ["as" => "admin.users.postEdit", "uses" => "Users@postEdit"]);
                // Route::get("delete/{id}", ["as" => "admin.users.delete", "uses" => "Users@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.users.status", "uses" => "Users@status"]);
                // Route::get("status-role/{id}/{status}", ["as" => "admin.users.role.status", "uses" => "Users@statusRole"]);
            });

            //admin
            Route::group(["prefix" => "admin"], function() {
                Route::get("/", ["as" => "admin.admins", "uses" => "Admins@index"]);
                Route::post("/", ["as" => "admin.admins", "uses" => "Admins@postIndex"]);
                Route::get("add", ["as" => "admin.admins.getAdd", "uses" => "Admins@add"]);
                Route::post("add", ["as" => "admin.admins.postAdd", "uses" => "Admins@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.admins.edit", "uses" => "Admins@edit"]);
                Route::post("edit/{id}", ["as" => "admin.admins.postEdit", "uses" => "Admins@postEdit"]);
                Route::get("delete/{id}", ["as" => "admin.admins.delete", "uses" => "Admins@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.admins.status", "uses" => "Admins@status"]);
                Route::get("/trash", ["as" => "admin.admins.trash", "uses" => "Admins@trash"]);
                Route::get("/trash/delete/{id}", ["as" => "admin.admins.trash", "uses" => "Admins@trashDelete"]);
            });

            //Role
            Route::group(["prefix" => "role"], function() {
                Route::get("/", ["as" => "admin.role", "uses" => "Role@index"]);
                Route::post("/", ["as" => "admin.role", "uses" => "Role@postIndex"]);
                Route::get("add", ["as" => "admin.role.getAdd", "uses" => "Role@add"]);
                Route::post("add", ["as" => "admin.role.postAdd", "uses" => "Role@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.role.edit", "uses" => "Role@edit"]);
                Route::post("edit/{id}", ["as" => "admin.role.postEdit", "uses" => "Role@postEdit"]);
            });


             //userCourse
             Route::group(["prefix" => "class"], function() {
                Route::get("/{id}", ["as" => "admin.class", "uses" => "UserCourse@index"]);
                Route::post("/{id}", ["as" => "admin.class", "uses" => "UserCourse@postIndex"]);
                // Route::get("add", ["as" => "admin.getAdd", "uses" => "Users@add"]);
                // Route::post("add", ["as" => "admin.postAdd", "uses" => "Users@postAdd"]);
                // Route::get("edit", ["as" => "admin.users.Edit", "uses" => "Users@edit"]);
                // Route::post("edit/{id}", ["as" => "admin.users.postEdit", "uses" => "Users@postEdit"]);
                Route::get("status/{id}/{status}", ["as" => "admin.teacher.status", "uses" => "UserCourse@status"]);
                Route::get("delete/{id}", ["as" => "admin.class.delete", "uses" => "UserCourse@delete"]);
                Route::get("trash2", ["as" => "admin.class.trash", "uses" => "Users@index"]);
                Route::get("trash/delete/{id}", ["as" => "admin.class.trash", "uses" => "UserCourse@trashDelete"]);  
            });
            Route::get("Class/trash", ["as" => "admin.class.trash", "uses" => "UserCourse@trash"]);

            //RolePermission
            Route::group(["prefix" => "role-permission"], function() {
                Route::get("/{id}", ["as" => "admin.rolePermission", "uses" => "RolePermission@index"]);
                //Route::post("/", ["as" => "admin.rolePermission", "uses" => "RolePermission@postIndex"]);
                Route::post("add/{id}", ["as" => "admin.rolePermission.postAdd", "uses" => "RolePermission@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.rolePermission.edit", "uses" => "RolePermission@edit"]);
                Route::get("role-detail/{id}", ["as" => "admin.rolePermission.show", "uses" => "RolePermission@role_detail"]);
                Route::post("edit/{id}", ["as" => "admin.rolePermission.postEdit", "uses" => "RolePermission@postEdit"]);
                Route::get("delete/{id}/{deletes}", ["as" => "admin.rolePermission.delete", "uses" => "RolePermission@role_permission_delete"]);
                Route::get("view/{id}/{views}", ["as" => "admin.rolePermission.view", "uses" => "RolePermission@role_permission_view"]);
                Route::get("add/{id}/{adds}", ["as" => "admin.rolePermission.add", "uses" => "RolePermission@role_permission_add"]);
                Route::get("edit/{id}/{edits}", ["as" => "admin.rolePermission.edit", "uses" => "RolePermission@role_permission_edit"]);
            });

            //Teacher
            Route::group(["prefix" => "teacher"], function() {
                Route::get("/", ["as" => "admin.teacher", "uses" => "Teachers@index"]);
                Route::post("/", ["as" => "admin.teacher", "uses" => "Teachers@postIndex"]);
                Route::get("add", ["as" => "admin.teacher.getAdd", "uses" => "Teachers@add"]);
                Route::post("add", ["as" => "admin.teacher.postAdd", "uses" => "Teachers@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.teacher.edit", "uses" => "Teachers@edit"]);
                Route::post("edit/{id}", ["as" => "admin.teacher.postEdit", "uses" => "Teachers@postEdit"]);
                Route::get("delete/{id}", ["as" => "admin.teacher.delete", "uses" => "Teachers@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.teacher.status", "uses" => "Teachers@status"]);
                Route::get("/trash", ["as" => "admin.teacher.trash", "uses" => "Teachers@trash"]);
                Route::get("/trash/delete/{id}", ["as" => "admin.teacher.trash", "uses" => "Teachers@trashDelete"]);
                Route::get("/course/delete/{id}", ["as" => "admin.course.delete", "uses" => "Teachers@courseDelete"]);
                Route::get("/course/status/{id}/{status}", ["as" => "admin.course.status", "uses" => "Teachers@courseStatus"]);
            });

            //CryptocurrencyWallet
            Route::group(["prefix" => "crypto"], function() {
                Route::get("/", ["as" => "admin.wallet", "uses" => "Crypto@index"]);
                Route::post("/", ["as" => "admin.wallet", "uses" => "Crypto@postIndex"]);
                Route::get("add", ["as" => "admin.wallet.getAdd", "uses" => "Crypto@add"]);
                Route::post("add", ["as" => "admin.wallet.postAdd", "uses" => "Crypto@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.wallet.edit", "uses" => "Crypto@edit"]);
                Route::post("edit/{id}", ["as" => "admin.wallet.postEdit", "uses" => "Crypto@postEdit"]);
                Route::get("delete/{id}", ["as" => "admin.wallet.delete", "uses" => "Crypto@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.wallet.status", "uses" => "Crypto@status"]);
                Route::get("/trash", ["as" => "admin.wallet.trash", "uses" => "Crypto@trash"]);
                Route::get("/trash/delete/{id}", ["as" => "admin.wallet.trash", "uses" => "Crypto@trashDelete"]);
                Route::get("/course/delete/{id}", ["as" => "admin.wallet.delete", "uses" => "Crypto@courseDelete"]);
                Route::get("/course/status/{id}/{status}", ["as" => "admin.wallet.status", "uses" => "Crypto@courseStatus"]);
            });


            //testimonials
            Route::group(["prefix" => "testimonials"], function() {
                Route::get("/", ["as" => "admin.testimonials", "uses" => "Testimonials@index"]);
                Route::post("/", ["as" => "admin.testimonials", "uses" => "Testimonials@postIndex"]);
                Route::get("add", ["as" => "admin.testimonials.getAdd", "uses" => "Testimonials@add"]);
                Route::post("add", ["as" => "admin.testimonials.postAdd", "uses" => "Testimonials@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.testimonials.edit", "uses" => "Testimonials@edit"]);
                Route::post("edit/{id}", ["as" => "admin.testimonials.postEdit", "uses" => "Testimonials@postEdit"]);
                Route::get("delete/{id}", ["as" => "admin.testimonials.delete", "uses" => "Testimonials@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.testimonials.status", "uses" => "Testimonials@status"]);
                Route::get("/trash", ["as" => "admin.testimonials.trash", "uses" => "Testimonials@trash"]);
                Route::get("/trash/delete/{id}", ["as" => "admin.testimonials.trash", "uses" => "Testimonials@trashDelete"]);
            });

            //faq
            Route::group(["prefix" => "faq"], function() {
                Route::get("/", ["as" => "admin.faq", "uses" => "Faq@index"]);
                Route::post("/", ["as" => "admin.faq", "uses" => "Faq@postIndex"]);
                Route::get("add", ["as" => "admin.faq.getAdd", "uses" => "Faq@add"]);
                Route::post("add", ["as" => "admin.faq.postAdd", "uses" => "Faq@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.faq.edit", "uses" => "Faq@edit"]);
                Route::post("edit/{id}", ["as" => "admin.faq.postEdit", "uses" => "Faq@postEdit"]);
                Route::get("delete/{id}", ["as" => "admin.faq.delete", "uses" => "Faq@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.faq.status", "uses" => "Faq@status"]);
                Route::get("/trash", ["as" => "admin.faq.trash", "uses" => "Faq@trash"]);
                Route::get("/trash/delete/{id}", ["as" => "admin.faq.trash", "uses" => "Faq@trashDelete"]);
            });

            //policy
            Route::group(["prefix" => "policy"], function() {
                Route::get("/", ["as" => "admin.policy", "uses" => "Policy@index"]);
                Route::post("/", ["as" => "admin.policy", "uses" => "Policy@postIndex"]);
                Route::get("add", ["as" => "admin.policy.getAdd", "uses" => "Policy@add"]);
                Route::post("add", ["as" => "admin.policy.postAdd", "uses" => "Policy@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.policy.edit", "uses" => "Policy@edit"]);
                Route::post("edit/{id}", ["as" => "admin.policy.postEdit", "uses" => "Policy@postEdit"]);
                Route::get("delete/{id}", ["as" => "admin.policy.delete", "uses" => "Policy@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.policy.status", "uses" => "Policy@status"]);
                Route::get("/trash", ["as" => "admin.policy.trash", "uses" => "Policy@trash"]);
                Route::get("/trash/delete/{id}", ["as" => "admin.policy.trash", "uses" => "Policy@trashDelete"]);
            });

             //course
             Route::group(["prefix" => "course"], function() {
                Route::get("/", ["as" => "admin.course", "uses" => "Course@index"]);
                Route::post("/", ["as" => "admin.course", "uses" => "Course@postIndex"]);
                Route::get("add", ["as" => "admin.course.add", "uses" => "Course@add"]);
                Route::post("add", ["as" => "admin.course.postAdd", "uses" => "Course@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.course.edit", "uses" => "Course@edit"]);
                Route::post("edit/{id}", ["as" => "admin.course.postEdit", "uses" => "Course@postEdit"]);
                Route::get("/trash", ["as" => "admin.course.trash", "uses" => "Course@trash"]);
                Route::get("/trash/delete/{id}", ["as" => "admin.course.trash", "uses" => "Course@trashDelete"]);
                Route::get("delete/{id}", ["as" => "admin.course.delete", "uses" => "Course@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.course.status", "uses" => "Course@status"]);
            });


            //course category
            Route::group(["prefix" => "course-category"], function() {
                Route::get("/", ["as" => "admin.course_category", "uses" => "CourseCategory@index"]);
                Route::post("/", ["as" => "admin.course_category", "uses" => "CourseCategory@postIndex"]);
                Route::get("add", ["as" => "admin.course_category.add", "uses" => "CourseCategory@add"]);
                Route::post("add", ["as" => "admin.course_category.postAdd", "uses" => "CourseCategory@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.course_category.edit", "uses" => "CourseCategory@edit"]);
                Route::post("edit/{id}", ["as" => "admin.course_category.postEdit", "uses" => "CourseCategory@postEdit"]);
                Route::get("/trash", ["as" => "admin.course_category.trash", "uses" => "CourseCategory@trash"]);
                Route::get("/trash/delete/{id}", ["as" => "admin.course_category.trash", "uses" => "CourseCategory@trashDelete"]);
                Route::get("delete/{id}", ["as" => "admin.course_category.delete", "uses" => "CourseCategory@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.course_category.status", "uses" => "CourseCategory@status"]);
            });

             //Advertisement
             Route::group(["prefix" => "advertisement"], function() {
                Route::get("/", ["as" => "admin.advertisement", "uses" => "Advertisement@index"]);
                Route::post("/", ["as" => "admin.advertisement", "uses" => "Advertisement@postIndex"]);
                Route::get("add", ["as" => "admin.advertisement.add", "uses" => "Advertisement@add"]);
                Route::post("add", ["as" => "admin.advertisement.postAdd", "uses" => "Advertisement@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.advertisement.edit", "uses" => "Advertisement@edit"]);
                Route::post("edit/{id}", ["as" => "admin.advertisement.postEdit", "uses" => "Advertisement@postEdit"]);
                Route::get("/trash", ["as" => "admin.advertisement.trash", "uses" => "Advertisement@trash"]);
                Route::get("/trash/delete/{id}", ["as" => "admin.advertisement.trash", "uses" => "Advertisement@trashDelete"]);
                Route::get("delete/{id}", ["as" => "admin.advertisement.delete", "uses" => "Advertisement@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.advertisement.status", "uses" => "Advertisement@status"]);
            });

            //subcribe
            Route::group(["prefix" => "subcribe"], function() {
                Route::get("/", ["as" => "admin.subcribe", "uses" => "Subcribe@index"]);
                Route::post("/", ["as" => "admin.subcribe", "uses" => "Subcribe@postIndex"]);
            });

            //profile
            Route::get("myaccount", ["as" => "admin.myaccount", "uses" => "MyAccount@index"]);
            Route::get("change-password", ["as" => "admin.change_password", "uses" => "MyAccount@change_password"]);
            Route::post("change-password", ["as" => "admin.change_password_request", "uses" => "MyAccount@change_password_request"]);
            Route::post("myaccount", ["as" => "admin.myaccount.update", "uses" => "MyAccount@update"]);
            
            //slide
            Route::group(["prefix" => "slide"], function() {
                Route::get("/", ["as" => "admin.slide", "uses" => "Slide@index"]);
                //Route::post("/", ["as" => "admin.slide", "uses" => "Configuration@postSetting"]);
                Route::get("add", ["as" => "admin.slide.add", "uses" => "Slide@add"]);
                Route::post("add", ["as" => "admin.slide.postAdd", "uses" => "Slide@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.slide.edit", "uses" => "Slide@edit"]);
                Route::post("edit/{id}", ["as" => "admin.slide.postEdit", "uses" => "Slide@postEdit"]);
                Route::get("delete/{id}", ["as" => "admin.slide.delete", "uses" => "Slide@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.slide.status", "uses" => "Slide@status"]);
                Route::get("/trash", ["as" => "admin.slide.trash", "uses" => "Slide@trash"]);
                Route::get("/trash/delete/{id}", ["as" => "admin.slide.trash", "uses" => "Slide@trashDelete"]);
            });
            
            //blog
            Route::group(["prefix" => "blog"], function() {
                Route::get("/", ["as" => "admin.blog", "uses" => "Blog@index"]);
                Route::post("/", ["as" => "admin.blog", "uses" => "Blog@postIndex"]);
                Route::get("add", ["as" => "admin.blog.add", "uses" => "Blog@add"]);
                Route::post("add", ["as" => "admin.blog.postAdd", "uses" => "Blog@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.blog.edit", "uses" => "Blog@edit"]);
                Route::post("edit/{id}", ["as" => "admin.blog.postEdit", "uses" => "Blog@postEdit"]);
                Route::get("delete/{id}", ["as" => "admin.blog.delete", "uses" => "Blog@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.blog.status", "uses" => "Blog@status"]);
                Route::get("/trash", ["as" => "admin.blog.trash", "uses" => "Blog@trash"]);
                Route::get("/trash/delete/{id}", ["as" => "admin.blog.trash", "uses" => "Blog@trashDelete"]);
            });
            
            //Service
            Route::group(["prefix" => "service"], function() {
                Route::get("/", ["as" => "admin.service", "uses" => "Service@index"]);
                Route::post("/", ["as" => "admin.service", "uses" => "Service@postIndex"]);
                Route::get("add", ["as" => "admin.service.add", "uses" => "Service@add"]);
                Route::post("add", ["as" => "admin.service.postAdd", "uses" => "Service@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.service.edit", "uses" => "Service@edit"]);
                Route::post("edit/{id}", ["as" => "admin.service.postEdit", "uses" => "Service@postEdit"]);
                Route::get("delete/{id}", ["as" => "admin.service.delete", "uses" => "Service@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.service.status", "uses" => "Service@status"]);
                Route::get("/trash", ["as" => "admin.service.trash", "uses" => "Service@trash"]);
                Route::get("/trash/delete/{id}", ["as" => "admin.service.trash", "uses" => "Service@trashDelete"]);
            });
            
            //Project
            Route::group(["prefix" => "project"], function() {
                Route::get("/", ["as" => "admin.project", "uses" => "Project@index"]);
                Route::post("/", ["as" => "admin.project", "uses" => "Project@postIndex"]);
                Route::get("add", ["as" => "admin.project.add", "uses" => "Project@add"]);
                Route::post("add", ["as" => "admin.project.postAdd", "uses" => "Project@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.project.edit", "uses" => "Project@edit"]);
                Route::post("edit/{id}", ["as" => "admin.project.postEdit", "uses" => "Project@postEdit"]);
                Route::get("delete/{id}", ["as" => "admin.project.delete", "uses" => "Project@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.project.status", "uses" => "Project@status"]);
                Route::get("/trash", ["as" => "admin.project.trash", "uses" => "Project@trash"]);
                Route::get("/trash/delete/{id}", ["as" => "admin.project.trash", "uses" => "Project@trashDelete"]);
            });
            
            //Brand
            Route::group(["prefix" => "brand"], function() {
                Route::get("/", ["as" => "admin.brand", "uses" => "Brand@index"]);
                Route::post("/", ["as" => "admin.brand", "uses" => "Brand@postIndex"]);
                Route::get("add", ["as" => "admin.brand.add", "uses" => "Brand@add"]);
                Route::post("add", ["as" => "admin.brand.postAdd", "uses" => "Brand@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.brand.edit", "uses" => "Brand@edit"]);
                Route::post("edit/{id}", ["as" => "admin.brand.postEdit", "uses" => "Brand@postEdit"]);
                Route::get("delete/{id}", ["as" => "admin.brand.delete", "uses" => "Brand@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.brand.status", "uses" => "Brand@status"]);
                Route::get("/trash", ["as" => "admin.brand.trash", "uses" => "Brand@trash"]);
                Route::get("/trash/delete/{id}", ["as" => "admin.brand.trash", "uses" => "Brand@trashDelete"]);
            });
            
            //Contact
            Route::group(["prefix" => "contact"], function() {
                Route::get("/", ["as" => "admin.contact", "uses" => "Contact@index"]);
                Route::post("/", ["as" => "admin.contact", "uses" => "Contact@postIndex"]);
                Route::get("add", ["as" => "admin.contact.add", "uses" => "Contact@add"]);
                Route::post("add", ["as" => "admin.contact.postAdd", "uses" => "Contact@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.contact.edit", "uses" => "Contact@edit"]);
                Route::post("edit/{id}", ["as" => "admin.contact.postEdit", "uses" => "Contact@postEdit"]);
                Route::get("delete/{id}", ["as" => "admin.contact.delete", "uses" => "Contact@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.contact.status", "uses" => "Contact@status"]);
                Route::get("/trash", ["as" => "admin.contact.trash", "uses" => "Contact@trash"]);
                Route::get("/trash/delete/{id}", ["as" => "admin.contact.trash", "uses" => "Contact@trashDelete"]);
            }); 

            //blog category
            Route::group(["prefix" => "blog-category"], function() {
                Route::get("/", ["as" => "admin.blog_category", "uses" => "BlogCategory@index"]);
                Route::post("/", ["as" => "admin.blog_category", "uses" => "BlogCategory@postSetting"]);
                Route::get("add", ["as" => "admin.blog_category.add", "uses" => "BlogCategory@add"]);
                Route::post("add", ["as" => "admin.blog_category.postAdd", "uses" => "BlogCategory@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.blog_category.edit", "uses" => "BlogCategory@edit"]);
                Route::post("edit/{id}", ["as" => "admin.blog_category.postEdit", "uses" => "BlogCategory@postEdit"]);
                Route::get("delete/{id}", ["as" => "admin.blog_category.delete", "uses" => "BlogCategory@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.blog_category.status", "uses" => "BlogCategory@status"]);
            });

            //product
            Route::group(["prefix" => "product"], function() {
                Route::get("/", ["as" => "admin.product", "uses" => "Product@index"]);
                Route::post("/", ["as" => "admin.product", "uses" => "Product@postIndex"]);
                Route::get("add", ["as" => "admin.product.add", "uses" => "Product@add"]);
                Route::post("add", ["as" => "admin.product.postAdd", "uses" => "Product@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.product.edit", "uses" => "Product@edit"]);
                Route::post("edit/{id}", ["as" => "admin.product.postEdit", "uses" => "Product@postEdit"]);
                Route::get("delete/{id}", ["as" => "admin.product.delete", "uses" => "Product@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.product.status", "uses" => "Product@status"]);

                Route::post("addphoto", ["as" => "admin.product.postAddPhoto", "uses" => "Product@postAddPhoto"]);
                Route::post("editphoto", ["as" => "admin.product.postEditPhoto", "uses" => "Product@postEditPhoto"]);

                Route::get("delete/photo/{id}", ["as" => "admin.product.photo.delete", "uses" => "Product@deletePhoto"]);
                Route::get("status/photo/{id}/{status}", ["as" => "admin.product.photo.status", "uses" => "Product@statusPhoto"]);
                
                Route::get("/trash", ["as" => "admin.product.trash", "uses" => "Product@trash"]);
                Route::get("/trash/delete/{id}", ["as" => "admin.product.trash", "uses" => "Product@trashDelete"]);
            });

            //Product category
            Route::group(["prefix" => "product-category"], function() {
                Route::get("/", ["as" => "admin.product_category", "uses" => "ProductCategory@index"]);
                Route::post("/", ["as" => "admin.product_category", "uses" => "ProductCategory@postSetting"]);
                Route::get("add", ["as" => "admin.product_category.add", "uses" => "ProductCategory@add"]);
                Route::post("add", ["as" => "admin.product_category.postAdd", "uses" => "ProductCategory@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.product_category.edit", "uses" => "ProductCategory@edit"]);
                Route::post("edit/{id}", ["as" => "admin.product_category.postEdit", "uses" => "ProductCategory@postEdit"]);
                Route::get("delete/{id}", ["as" => "admin.product_category.delete", "uses" => "ProductCategory@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.product_category.status", "uses" => "ProductCategory@status"]);
            });


            //region - khu vuc
            Route::group(["prefix" => "region"], function() {
                Route::get("/", ["as" => "admin.region", "uses" => "Region@index"]);
                Route::post("/", ["as" => "admin.region", "uses" => "Region@postSetting"]);
                Route::get("add", ["as" => "admin.region.add", "uses" => "Region@add"]);
                Route::post("add", ["as" => "admin.region.postAdd", "uses" => "Region@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.region.edit", "uses" => "Region@edit"]);
                Route::post("edit/{id}", ["as" => "admin.region.postEdit", "uses" => "Region@postEdit"]);
                Route::get("delete/{id}", ["as" => "admin.region.delete", "uses" => "Region@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.region.status", "uses" => "Region@status"]);
            });

            //orders - don hang
            Route::group(["prefix" => "orders"], function() {
                Route::get("/", ["as" => "admin.orders", "uses" => "Orders@index"]);
                Route::post("/", ["as" => "admin.orders", "uses" => "Orders@postSetting"]);
                Route::get("add", ["as" => "admin.orders.add", "uses" => "Orders@add"]);
                Route::post("add", ["as" => "admin.orders.postAdd", "uses" => "Orders@postAdd"]);
                Route::get("edit/{id}", ["as" => "admin.orders.edit", "uses" => "Orders@edit"]);
                Route::post("edit/{id}", ["as" => "admin.orders.postEdit", "uses" => "Orders@postEdit"]);
                Route::get("delete/{id}", ["as" => "admin.orders.delete", "uses" => "Orders@delete"]);
                Route::get("status/{id}/{status}", ["as" => "admin.orders.status", "uses" => "Orders@status"]);
            });

            //config
            Route::group(["prefix" => "config"], function() {
                Route::get("/", ["as" => "admin.config", "uses" => "Config@setting"]);
                Route::post("/", ["as" => "admin.config", "uses" => "Config@postSetting"]);
                // Route::get("seo", ["as" => "admin.config.seo", "uses" => "Config@seo"]);
                // Route::post("seo", ["as" => "admin.config.postSeo", "uses" => "Config@postSeo"]);
                // Route::get("social", ["as" => "admin.config.social", "uses" => "Config@social"]);
                // Route::post("social", ["as" => "admin.config.postSocial", "uses" => "Config@postSocial"]);
            });
             //config home section 1
             Route::group(["prefix" => "home-section-1"], function() {
                Route::get("/", ["as" => "admin.home.section1", "uses" => "Home@section1"]);
                Route::post("/", ["as" => "admin.home.section1", "uses" => "Home@postSection1"]);
            });

             //config home section 2
             Route::group(["prefix" => "home-section-2"], function() {
                Route::get("/", ["as" => "admin.home.section2", "uses" => "Home@section2"]);
                Route::post("/", ["as" => "admin.home.section2", "uses" => "Home@postSection2"]);
            });

            //config home section 3
            Route::group(["prefix" => "home-section-3"], function() {
                Route::get("/", ["as" => "admin.home.section3", "uses" => "Home@section3"]);
                Route::post("/", ["as" => "admin.home.section3", "uses" => "Home@postSection3"]);
            });
        
            //setting
            Route::group(["prefix" => "setting"], function() {
                Route::get("/thumb", ["as" => "admin.setting.thumb", "uses" => "Setting@thumb"]);
                Route::post("/thumb", ["as" => "admin.setting.thumb", "uses" => "Setting@postThumb"]);
                
                Route::get("seo", ["as" => "admin.setting.seo", "uses" => "Configuration@seo"]);
                Route::post("seo", ["as" => "admin.setting.postSeo", "uses" => "Configuration@postSeo"]);
                Route::get("social", ["as" => "admin.setting.social", "uses" => "Configuration@social"]);
                Route::post("social", ["as" => "admin.setting.postSocial", "uses" => "Configuration@postSocial"]);
            });
        });
    });
});