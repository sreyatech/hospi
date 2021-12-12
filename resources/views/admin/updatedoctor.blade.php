<base href="/public">
@include('admin.header')
@include('admin.sidebar')

<style type="text/css">
    
    label {
        display: inline-block;
        width: 200px;
    }

</style>
<main id="main" class="main border">
    <div class="pagetitle">
        <h1>Update Doctors</h1>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="container page-body-wrapper" style="padding-top: 10px;">
            <form action="{{ url('editdoctor',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-2">
                    <label for="">Doctor Name : </label>
                    <input type="text" name="name" value="{{$data->name}}" required>
                </div>
                <div class="p-2">
                    <label for="">Phone : </label>
                    <input type="text" name="phone" value="{{$data->phone}}" required>
                </div>
                <div class="p-2">
                    <label for="">Speciality</label>
                    <select name="speciality" id="" required>
                        <option>{{$data->speciality}}</option>
                        <option value="skin">Skin</option>
                        <option value="heart">Heart</option>
                        <option value="eye">Eye</option>
                        <option value="nose">Nose</option>
                    </select>
                </div>
                <div class="p-2">
                    <label for="">Room No : </label>
                    <input type="text" name="room" value="{{$data->room}}" required>
                </div>
                <div class="p-2">
                    <label for="">Doctor Image : </label>
                    <img src="doctorImage/{{$data->image}}" style="height: 150; width:400;" alt="oldImage">
                </div>
                <div class="p-2">
                    <label for="">Change Image : </label>
                    <input type="file" name="file" id="">
                </div>
                <div class="p-2">
                    <input type="submit" class="btn btn-primary" required>
                </div>
            </form>
        </div>
    </div>
</main>
