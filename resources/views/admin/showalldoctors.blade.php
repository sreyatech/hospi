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
        <h1>All Doctors</h1>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="container page-body-wrapper" style="padding-top: 10px;">

        <table class="table">
        <tr>
            <th scope="col">image</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Speciality</th>
            <th scope="col">Room</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        @foreach($doctors as $item)
        <tr>
            <td><img src="doctorImage/{{$item->image}}" alt="doctor image" style="height:100px;width:100px;"></td>
            <td>{{$item->name}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->speciality}}</td>
            <td>{{$item->room}}</td>
            <td><a href="{{ url('updatedoctor',$item->id) }}" class="btn btn-info">Update</a></td>
            <td><a href="{{url('deletedoctor',$item->id)}}" class="btn btn-danger" onclick="return confirm('are you sure to delete this??')">Delete</a></td>
        </tr>
        @endforeach
        </table>

        </div>
    </div>
</main>
