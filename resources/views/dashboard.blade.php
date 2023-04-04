<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servers</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js"></script>
    <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.css">
    <style>
        .noUi-connect {
            background: #376cee;
        }

        .noUi-target {
            background: transparent;
            border-radius: 0;
            border: none;
            box-shadow: none;
        }

        .noUi-connects {
            background: #7b99e1;
        }
    </style>
  </head>
<body>

<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Server Filter Dashboard</h1>
    </div>
</section>
<section class="bg-white dark:bg-gray-900">
    <form class="grid grid-cols-2 gap-4" enctype="application/x-www-form-urlencoded" method="post">
        <div class="px-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                HDD Type
            </label>
            <div class="relative">
                <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-state">
                    <option>Select HDD Type</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->type}}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="px-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                Location
            </label>
            <div class="relative">
                <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-state">
                    <option>Select Location</option>
                    @foreach($locations as $location)
                        <option value="{{$location->id}}">{{$location->location}}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </div>
            </div>
        </div>
        <div class="px-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="capacity[]">
                Storage
            </label>
            <div class="relative">
                <div class="row text-center m-2">
                    <div id="slider"></div>
                </div>
            <div class="row text-center mt-2">
                <div class="col-6">
                    <p>From: <b><span id="min"></span></b></p>
                </div>
                <div class="col-6">
                    <p>To: <b><span id="max"></span></b></p>
                </div>
            </div>
            </div>
        </div>
        <div class="px-6">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                RAM
            </label>
            <div class="relative">
                <div class="grid grid-cols-2">
                    <div>
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value=""
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">2GB</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value=""
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">4GB</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value=""
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">8GB</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value=""
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">12GB</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value=""
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">16GB</label>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value=""
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">24GB</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value=""
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">32GB</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value=""
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">48GB</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value=""
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">64GB</label>
                        </div>
                        <div class="flex items-center mb-4">
                            <input id="default-checkbox" type="checkbox" value=""
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">96GB</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div></div>
        <div class="grid grid-cols-4 center items-start mb-6 w-full">
            <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
        </div>
    </form>
</section>
<section>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="table-success">
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">Model</th>
                <th scope="col" class="px-6 py-3">HDD</th>
                <th scope="col" class="px-6 py-3">RAM</th>
                <th scope="col" class="px-6 py-3">Location</th>
                <th scope="col" class="px-6 py-3">Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($servers as $server)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$server->id}}</th>
                    <td class="px-6 py-4">{{$server->model->name}}</td>
                    <td class="px-6 py-4">{{$server->hard_disk->name}}</td>
                    <td class="px-6 py-4">{{$server->ram->name}}</td>
                    <td class="px-6 py-4">{{$server->location->name}}</td>
                    <td class="px-6 py-4">{{$server->price}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $servers->appends(Request::except('token'))->links()  !!}
    </div>
</section>
</body>
<script type="application/javascript">

        const storages = ['0', '250GB', '500GB', '1TB', '2TB', '3TB', '4TB', '8TB', '12TB', '24TB', '48TB', '72TB'];
        let slider = document.getElementById("slider");

        noUiSlider.create(slider, {
            start: [0, 11],
            connect: true,
            step: 1,
            range: {
                min: 0,
                max: 11
            }
        });

        let min_element = document.getElementById("min");
        let max_element = document.getElementById("max");


        slider.noUiSlider.on("update", function (values, handle) {
            let slider_values = slider.noUiSlider.get();
            min_element.innerHTML = storages[parseInt(slider_values[0])];
            max_element.innerHTML = storages[parseInt(slider_values[1])];

        });

</script>
</html>
