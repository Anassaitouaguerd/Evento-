@if (session()->has('passIsChanged'))
<span class="text-bg-danger p-2 rounded-3">{{session('passIsChanged')}}</span>
@endif
@if (session()->has('success'))
          <span class="text-bg-danger p-2 rounded-3">{{session('success')}}</span>
@endif
@if (session()->has('error'))
          <span class="text-bg-danger p-2 rounded-3">{{session('error')}}</span>
@endif