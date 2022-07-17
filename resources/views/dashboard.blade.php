<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @section("content")
    <div class="container" >

    </div>
    <div class="row" >
        <div class="col-3" style="height: 70vh">
            <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" >
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                  <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                  <span class="fs-4">Dashboard</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">

                <li class="nav-item">
                  <a href="{{route('m-book.index')}}" class="nav-link " :active="request()->routeIs('manager.index')"  aria-current="page">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                    HOME
                  </a>
                </li>

                <li class="nav-item">
                  <a href="{{route('users.index')}}" class="nav-link " :active="request()->routeIs('manager.index')"  aria-current="page">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                    My Profile
                  </a>
                </li>

                  <li class="nav-item">
                    <a href="{{route('Categories.index')}}" class="nav-link" :active="request()->routeIs('Categories.index')" aria-current="page">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                      Categories
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('manager.index')}}" class="nav-link " :active="request()->routeIs('manager.index')"  aria-current="page">
                      <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                      Control Manager
                    </a>
                  </li>


                </ul>
                <hr>

              </div>
        </div>
        <div class="col-9" style="height: 70vh">
            <div id="chart" style="height: 80% ;"  class="float-start" ></div>
        </div>
    </div>

        {{-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div> --}}
    @endsection
</x-app-layout>
<script>
    const chart = new Chartisan({
      el: '#chart',
      url: "@chart('new_chart')",
      hooks: new ChartisanHooks()
            .colors()
            .responsive()
            .beginAtZero()
            .legend({ position: 'bottom' })
            .title('This is a sample chart using chartisan!')
            .datasets([{ type: 'line', fill: false }, 'bar']),
    });
  </script>
