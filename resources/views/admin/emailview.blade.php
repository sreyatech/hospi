<base href="/public">

@include('admin.header')
@include('admin.sidebar')
<style type="text/css">
    label {
        display: inline-block;
        width: 200px;
    }

</style>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Send Email</h1>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="container page-body-wrapper" style="padding-top: 10px;">
            <form action="{{ url('sendemail',$data->id) }}" method="POST">
                @csrf
                <div class="p-2">
                    <label for="">Greeting : </label>
                    <input type="text" name="greeting" required>
                </div>
                <div class="p-2">
                    <label for="">body : </label>
                    <input type="text" name="body" required>
                </div>
          
                <div class="p-2">
                    <label for="">action text : </label>
                    <input type="text" name="actiontext" required>
                </div>
                <div class="p-2">
                    <label for="">action url : </label>
                    <input type="text" name="actionurl" required>
                </div>
                <div class="p-2">
                    <label for="">end part : </label>
                    <input type="text" name="endpart" required>
                </div>
              
                <div class="p-2">
                    <input type="submit" class="btn btn-success" required>
                </div>
            </form>
        </div>
    </div>
</main>
