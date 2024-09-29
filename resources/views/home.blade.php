@extends('layouts.app')

@section('content')
    <section class="mt-20">
        <h2 class="text-3xl text-brand-black font-semibold leading-relaxed">Новости</h2>
        <div class="flex flex-col space-y-6 lg:flex-row lg:space-x-14 lg:space-y-0">
            <div class="grid grid-cols-1 gap-3 md:grid-cols-2 md:gap-3 lg:gap-7 max-w-5xl lg:w-2/3">
                @foreach($news as $newsItem)
                <article class="group flex flex-col shadow-lg rounded-xl overflow-hidden border border-transparent hover:border-brand-orange-hov">
                    <div class="relative p-5 h-56 overflow-hidden flex items-start space-x-2 lg:h-64 bg-cover bg-bottom"
                        style="background-image: url('{{ asset($newsItem->image_path) }}')"
                    >
                        @foreach ($newsItem->tags as $tag)
                            <div class="px-3.5 py-3 text-xs {{ $tag->text_color }} {{ $tag->bg_color }} font-medium rounded-md">{{ $tag->title }}</div>
                        @endforeach
                    </div>
                    <div class="flex flex-col p-5">
                        <h4 class="text-lg font-bold leading-5 group-hover:text-brand-orange-hov">{{ $newsItem->title }}</h4>
                        <p class="font-medium text-brand-gray mb-3">{{ $newsItem->description }}</p>
                        <div class="date mt-auto text-sm font-semibold text-brand-gray">{{ $newsItem->publication_date }}</div>
                    </div>
                </article>
                @endforeach
            </div>
            <div class="shrink-0 lg:w-1/3 relative min-h-96">
                <div 
                    class="absolute inset-0 overflow-hidden rounded-xl
                        min-h-96
                        bg-cover bg-bottom"
                    style="background-image: url('{{ asset('images/purple-paint-yellow-rubber-duck.jpg') }}')"
                ></div>
            </div>
        </div>

    </section>
    <section class="mt-20">
        <h2 class="text-4xl text-brand-black font-semibold leading-relaxed">Видео</h2>
        <div class="hidden md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-3 lg:gap-7">
            @foreach ($videos as $video)
                <article class="group flex flex-col shadow-sm rounded-xl overflow-hidden border border-brand-gray-300 hover:border-brand-orange-hov">
                    <div class="overflow-hidden flex items-center md:h-60">
                        <img class="w-full" src="{{ asset($video->image_path) }}" alt="">
                    </div>
                    <div class="flex flex-col p-5">
                        <div class="flex flex-wrap -mx-2">
                            @foreach($video->tags as $tag)
                                <div class="px-3 py-2 m-2 text-xs font-medium text-brand-tag bg-brand-tag-primary">{{ $tag->title }}</div>
                            @endforeach
                        </div>
                        <h4 class="text-lg font-bold text-brand-black mt-5 group-hover:text-brand-orange-hov">Обзор на утку</h4>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="md:hidden mt-7" x-data='{
            slides: @json($videos->toArray()),
            activeSlideIndex: 0,
            delay: 150000,
            prev() {
                this.setIndex(-1)
            },
            next() {
                this.setIndex(1)
            },
            setIndex(value) {
                if(this.activeSlideIndex + value >= this.slides.length)
                {
                    this.activeSlideIndex = 0
                    return 1
                }
                if(this.activeSlideIndex + value < 0)
                {
                    this.activeSlideIndex = this.slides.length - 1
                    return 1
                }
                this.activeSlideIndex += value
            }
        }' x-init="() => {
            setInterval(() => {
                delay -= 10
                if(delay === 0) {
                    if (activeSlideIndex === slides.length - 1) {
                        activeSlideIndex = 0
                    } else {
                        activeSlideIndex += 1 
                    }
                    delay = 150000
                }
            }, 10)
        }">
            <ul class="relative">
                <div class="flex absolute items-end w-full justify-between px-3 z-10 h-40">
                    <button @click="prev" class="flex h-12 w-12 bg-white rounded-full justify-center items-center">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.1924 2.0574C14.2506 2.11545 14.2968 2.18442 14.3283 2.26035C14.3598 2.33629 14.376 2.41769 14.376 2.4999C14.376 2.58211 14.3598 2.66351 14.3283 2.73944C14.2968 2.81537 14.2506 2.88434 14.1924 2.9424L7.13365 9.9999L14.1924 17.0574C14.3098 17.1748 14.3757 17.3339 14.3757 17.4999C14.3757 17.6659 14.3098 17.825 14.1924 17.9424C14.075 18.0598 13.9159 18.1257 13.7499 18.1257C13.5839 18.1257 13.4248 18.0598 13.3074 17.9424L5.8074 10.4424C5.74919 10.3843 5.70301 10.3154 5.67151 10.2394C5.64 10.1635 5.62378 10.0821 5.62378 9.9999C5.62378 9.91769 5.64 9.83629 5.67151 9.76036C5.70301 9.68442 5.74919 9.61545 5.8074 9.5574L13.3074 2.0574C13.3655 1.99919 13.4344 1.95301 13.5104 1.92151C13.5863 1.89 13.6677 1.87378 13.7499 1.87378C13.8321 1.87378 13.9135 1.89 13.9894 1.92151C14.0654 1.95301 14.1343 1.99919 14.1924 2.0574Z" fill="#1F2937"/>
                        </svg>
                    </button>
                    <button @click="next" class="flex h-12 w-12 bg-white rounded-full justify-center items-center">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8076 2.0574C5.7494 2.11545 5.70322 2.18442 5.67171 2.26035C5.64021 2.33629 5.62399 2.41769 5.62399 2.4999C5.62399 2.58211 5.64021 2.66351 5.67171 2.73944C5.70322 2.81537 5.7494 2.88434 5.8076 2.9424L12.8664 9.9999L5.8076 17.0574C5.69025 17.1748 5.62432 17.3339 5.62432 17.4999C5.62432 17.6659 5.69025 17.825 5.8076 17.9424C5.92496 18.0598 6.08414 18.1257 6.2501 18.1257C6.41607 18.1257 6.57525 18.0598 6.6926 17.9424L14.1926 10.4424C14.2508 10.3843 14.297 10.3154 14.3285 10.2394C14.36 10.1635 14.3762 10.0821 14.3762 9.9999C14.3762 9.91769 14.36 9.83629 14.3285 9.76036C14.297 9.68442 14.2508 9.61545 14.1926 9.5574L6.6926 2.0574C6.63455 1.99919 6.56558 1.95301 6.48965 1.92151C6.41371 1.89 6.33231 1.87378 6.2501 1.87378C6.1679 1.87378 6.08649 1.89 6.01056 1.92151C5.93463 1.95301 5.86566 1.99919 5.8076 2.0574Z" fill="#1F2937"/>
                        </svg>
                    </button>
                </div>
                
                <template x-for="(slide, index) in slides" :key="index">
                    <li x-bind:class="{'absolute inset-0 opacity-0': index !== activeSlideIndex}">
                        <article class="flex flex-col shadow-sm rounded-xl overflow-hidden border border-brand-gray-300">
                            <div class="overflow-hidden flex items-center md:h-60">
                                <img class="w-full" x-bind:src="slide.imgUrl" alt="">
                            </div>
                            <div class="flex flex-col p-5">
                                <div class="flex flex-wrap -mx-2">
                                    <template x-for="tag in slide.tags">
                                        <div 
                                            class="px-3 py-2 m-2 text-xs font-medium text-brand-tag bg-brand-tag-primary rounded-md"
                                            x-text="tag"
                                        ></div>
                                    </template>
                                </div>
                                <h4 class="text-lg font-bold text-brand-black mt-5" x-text="slide.title"></h4>
                            </div>
                        </article>
                    </li>
                </template>
                <div class="slider relative h-2 w-full mt-3 bg-gray-200 rounded-full">
                    <div class="absolute h-2 bg-brand-orange rounded-full" x-bind:style="
                    'width: ' + (100 / slides.length) + '%;' + 'left:' + (100 / (slides.length / activeSlideIndex)) + '%;'
                    "></div>
                </div>
            </ul>
        </div>
    </section>
@endsection