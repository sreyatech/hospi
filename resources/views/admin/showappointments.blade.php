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
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Doctor Name</th>
            <th scope="col">Message</th>
            <th scope="col">Status</th>
            <th scope="col">Approve</th>
            <th scope="col">Cancel</th>
            <th scope="col">Send Mail</th>
        </tr>
        @foreach($data as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->doctor}}</td>
            <td>{{$item->message}}</td>
            <td>{{$item->status}}</td>
            <td><a href="{{url('approve',$item->id)}}" class="btn btn-success">Approve</a></td>
            <td><a href="{{url('cancel',$item->id)}}" class="btn btn-danger">Cancel</a></td>
            <td><a href="{{url('emailview',$item->id)}}" class="btn btn-warning">Send Mail</a></td>
        </tr>
        @endforeach
        </table>

        </div>
    </div>
</main>
