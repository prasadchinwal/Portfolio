---
title: About
description: A little bit about me
---
@extends('_layouts.master')

@section('body')
    <h1 class="py-5 font-extrabold text-4xl">About me!</h1>

    <div class="h-0">
        <img src="/assets/images/prasad-chinwal.jpeg"
            alt="About image"
            class="flex rounded-full h-72 w-72 bg-contain mx-auto md:float-right my-6 md:ml-10">
    </div>

    <div class="prose space-y-6">
        <p class="">I'm a full-stack developer at University of Illinois, Springfield. Currently living in Springfield, Illinois, United States of America 🇺🇸.</p>

        <p class="">Originally from Goa, India 🇮🇳, I came to United States to pursue higher degree (Master's in Computer Science) in Fall 2016.</p>

        <p class="">I like to learn new technologies and use them in production applications. Lately I have been spending a lot of time learning DevOps, in hopes of shifting my career towards DevOps. I am also working towards getting my AWS certification.</p>

        <p class="">In my free time I also like to read. Check out my books section to find out the <a href="/books" class="py-1 px-2 rounded-lg bg-purple-200 text-purple-700 no-underline font-semibold">books</a> I have read and love.</p>
    </div>
@endsection
