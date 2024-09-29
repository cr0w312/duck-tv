<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <title>{{ config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-body">
        <div class="container mx-auto">
            @if(isset($message))
                <div class="p-5 m-5 bg-green-300">
                    {{ $message }}
                </div>
            @endif
            <header class="flex justify-between items-center p-4 shadow-md rounded-lg rounded-t-none">
                <div class="logo h-11 md:h-auto">
                    <img class="h-full" src="{{ asset('images/Logo.png') }}" alt="">
                </div>
                <nav class="hidden lg:flex space-x-8">
                    <a href="#" class="text-brand-black text-sm font-medium hover:text-brand-link-hover">Новости</a>
                    <a href="#" class="text-brand-black text-sm font-medium hover:text-brand-link-hover">Видео</a>
                    <a href="#" class="text-brand-black text-sm font-medium hover:text-brand-link-hover">Виды уток</a>
                    <a href="#" class="text-brand-black text-sm font-medium hover:text-brand-link-hover">История уток</a>                
                </nav>
                <div class="flex space-x-5 items-center" x-data="{ 
                    open: false,
                    successMessage: '',
                    errors: {
                        name:[],
                        email:[]
                    },
                    application: {
                        name: '',
                        email: '',
                        _token: document.head.querySelector('meta[name=csrf-token]').content
                    },
                    checkForm() {
                        this.errors = {
                            name:[],
                            email:[]
                        } 
                        let response = fetch('/application', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept':'application/json',
                            },
                            body: JSON.stringify(this.application),
                        })
                        .then( (res) => res.json())
                        .then( (data) => {
                            if(data.errors){
                                this.errors.name = data.errors.name ? data.errors.name : ''
                                this.errors.email = data.errors.email ? data.errors.email : ''
                            } else {
                                this.successMessage = data.message
                            }                            
                        })
                    }
                }">
                    <div 
                        class="fixed bg-gray-700 inset-0 z-20 flex items-center justify-center"
                        x-show="open"
                    >
                        <div class="bg-white rounded-lg p-10 relative"
                            @click.outside="open = false"
                        >
                            <button 
                                class="absolute right-0 top-0 h-4 w-4 flex mt-3 mr-3 items-center justify-center"
                                @click="open = false"
                            >
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17 1C16.75 0.75004 16.4109 0.609619 16.0573 0.609619C15.7038 0.609619 15.3647 0.75004 15.1147 1L9 7.11467L2.88533 1C2.6353 0.75004 2.29622 0.609619 1.94267 0.609619C1.58912 0.609619 1.25004 0.75004 1 1C0.75004 1.25004 0.609619 1.58912 0.609619 1.94267C0.609619 2.29622 0.75004 2.6353 1 2.88533L7.11467 9L1 15.1147C0.75004 15.3647 0.609619 15.7038 0.609619 16.0573C0.609619 16.4109 0.75004 16.75 1 17C1.25004 17.25 1.58912 17.3904 1.94267 17.3904C2.29622 17.3904 2.6353 17.25 2.88533 17L9 10.8853L15.1147 17C15.3647 17.25 15.7038 17.3904 16.0573 17.3904C16.4109 17.3904 16.75 17.25 17 17C17.25 16.75 17.3904 16.4109 17.3904 16.0573C17.3904 15.7038 17.25 15.3647 17 15.1147L10.8853 9L17 2.88533C17.25 2.6353 17.3904 2.29622 17.3904 1.94267C17.3904 1.58912 17.25 1.25004 17 1Z" fill="#1F2937"/>
                                </svg>
                            </button>
                            <form
                                class="flex flex-col max-w-md mt-8 md:mt-0"
                                x-show="!successMessage.length"
                            >
                                <h4 class="text-brand-black text-xl leading-6 md:text-2xl md:leading-7 font-bold">Будем рады вашим предложениям по обзору на уток</h4>
                                <input 
                                    class="px-5 py-4 mt-5 bg-white border border-brand-border shadow-sm rounded-lg text-msm leading-4"
                                    placeholder="Ваше имя"
                                    type="text"
                                    x-model="application.name"
                                />
                                <div x-show="errors.name.length" class="text-red-500 py-3">
                                    <span x-text="errors.name[0]">
                                </div>
                                <input 
                                    class="px-5 py-4 mt-2 bg-white border border-brand-border shadow-sm rounded-lg text-msm leading-4" 
                                    placeholder="duck-tv@mail.ru" 
                                    type="email"
                                    x-model="application.email"
                                />
                                <div x-show="errors.email.length" class="text-red-500 py-3">
                                    <span x-text="errors.email[0]">
                                </div>
                                <button 
                                    type="submit" 
                                    class="mt-2 py-3 px-4 border border-transparent bg-brand-orange rounded-lg text-brand-white font-medium hover:border-white hover:bg-brand-orange-hov transition-colors duration-300"
                                    @click.prevent="await checkForm()"
                                >Отправить контакты</button>
                            </form>
                            <div 
                                class="flex flex-col max-w-md mt-8 md:mt-0"
                                x-show="successMessage.length"
                            >
                                <div class="text-2xl" x-text="successMessage"></div>
                            </div>
                        </div>
                    </div>
                    <button 
                        class="py-3 px-4 text-msm md:text-base border border-transparent bg-brand-orange rounded-lg text-brand-white font-medium hover:border-white hover:bg-brand-orange-hov transition-colors duration-300"
                        @click="open = true"
                    >Связаться с нами</button>
                    <button class="block lg:hidden">
                        <svg width="50" height="52" viewBox="0 0 50 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_8_2022)">
                                <path d="M2.08333 13H47.9167C48.4692 13 48.9991 12.7718 49.3898 12.3654C49.7805 11.9591 50 11.408 50 10.8334C50 10.2587 49.7805 9.70763 49.3898 9.3013C48.9991 8.89497 48.4692 8.6667 47.9167 8.6667H2.08333C1.5308 8.6667 1.0009 8.89497 0.610194 9.3013C0.219493 9.70763 0 10.2587 0 10.8334C0 11.408 0.219493 11.9591 0.610194 12.3654C1.0009 12.7718 1.5308 13 2.08333 13Z" fill="#FFD075"/>
                                <path d="M47.917 19.5H18.7503C18.1978 19.5 17.6679 19.7283 17.2772 20.1346C16.8865 20.5409 16.667 21.092 16.667 21.6667C16.667 22.2413 16.8865 22.7924 17.2772 23.1987C17.6679 23.6051 18.1978 23.8333 18.7503 23.8333H47.917C48.4695 23.8333 48.9994 23.6051 49.3901 23.1987C49.7808 22.7924 50.0003 22.2413 50.0003 21.6667C50.0003 21.092 49.7808 20.5409 49.3901 20.1346C48.9994 19.7283 48.4695 19.5 47.917 19.5Z" fill="#FFD075"/>
                                <path d="M47.917 41.1666H18.7503C18.1978 41.1666 17.6679 41.3949 17.2772 41.8012C16.8865 42.2075 16.667 42.7586 16.667 43.3333C16.667 43.9079 16.8865 44.459 17.2772 44.8654C17.6679 45.2717 18.1978 45.5 18.7503 45.5H47.917C48.4695 45.5 48.9994 45.2717 49.3901 44.8654C49.7808 44.459 50.0003 43.9079 50.0003 43.3333C50.0003 42.7586 49.7808 42.2075 49.3901 41.8012C48.9994 41.3949 48.4695 41.1666 47.917 41.1666Z" fill="#FFD075"/>
                                <path d="M47.9167 30.3334H2.08333C1.5308 30.3334 1.0009 30.5617 0.610194 30.968C0.219493 31.3743 0 31.9254 0 32.5001C0 33.0747 0.219493 33.6258 0.610194 34.0321C1.0009 34.4385 1.5308 34.6668 2.08333 34.6668H47.9167C48.4692 34.6668 48.9991 34.4385 49.3898 34.0321C49.7805 33.6258 50 33.0747 50 32.5001C50 31.9254 49.7805 31.3743 49.3898 30.968C48.9991 30.5617 48.4692 30.3334 47.9167 30.3334Z" fill="#FFD075"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_8_2022">
                                    <rect width="50" height="52" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </div>
            </header>
            <main class="px-4 lg:px-0">
                @yield('content')
            </main>
            <footer class="flex flex-col mt-16 pb-20 pt-8 px-4 md:mt-24 md:px-8 md:flex-row md:justify-between md:place-items-start shadow-footer rounded-lg rounded-b-none">
                <div class="flex flex-col justify-between md:min-h-56 lg:min-h-0 lg:justify-between lg:items-center lg:w-1/2 lg:flex-row">
                    <div class="logo"><img src="{{ asset('images/Logo.png') }}" alt=""></div>
                    
                    <nav class="flex flex-row mt-4 flex-wrap md:flex-col md:justify-center lg:flex-row">
                        <a href="#" class="mx-4 my-2 text-brand-black text-sm font-medium hover:text-brand-link-hover">Новости</a>
                        <a href="#" class="mx-4 my-2 text-brand-black text-sm font-medium hover:text-brand-link-hover">Видео</a>
                        <a href="#" class="mx-4 my-2 text-brand-black text-sm font-medium hover:text-brand-link-hover">Виды уток</a>
                        <a href="#" class="mx-4 my-2 text-brand-black text-sm font-medium hover:text-brand-link-hover">История уток</a>                
                    </nav>
                </div>
                <form action="/application" method="POST" class="flex flex-col max-w-md mt-8 md:mt-0">
                    @csrf
                    <h4 class="text-brand-black text-xl leading-6 md:text-2xl md:leading-7 font-bold">Будем рады вашим предложениям по обзору на уток</h4>
                    <input class="px-5 py-4 mt-5 bg-white border border-brand-border shadow-sm rounded-lg text-msm leading-4 hover:text-brand-gray @error('name') text-red-500 border-red-500 @enderror" placeholder="Ваше имя" type="text" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-xs text-red-500">{{ $message }}</div>
                    @enderror
                    <input class="px-5 py-4 mt-2 bg-white border border-brand-border shadow-sm rounded-lg text-msm leading-4 hover:text-brand-gray @error('name') text-red-500 border-red-500 @enderror" placeholder="+7 (000) 000-00-00" type="text" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-xs text-red-500">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="mt-2 py-3 px-4 border border-transparent bg-brand-orange rounded-lg text-brand-white font-medium hover:border-white hover:bg-brand-orange-hov transition-colors duration-300">Отправить контакты</button>
                </form>
            </footer>
        </div>
    </body>
</html>
