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
        <h1>Add Doctors</h1>
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="container page-body-wrapper" style="padding-top: 10px;">
            <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-2">
                    <label for="">Doctor Name : </label>
                    <input type="text" name="name" placeholder="write the name" required>
                </div>
                <div class="p-2">
                    <label for="">Phone : </label>
                    <input type="text" name="phone" placeholder="write the phone name" required>
                </div>
                <div class="p-2">
                    <label for="">Speciality</label>
                    <select name="speciality" id="" required>
                        <option>--Select--</option>
                        <option value="skin">Skin</option>
                        <option value="heart">Heart</option>
                        <option value="eye">Eye</option>
                        <option value="nose">Nose</option>
                    </select>
                </div>
                <div class="p-2">
                    <label for="">Room No : </label>
                    <input type="text" name="room" placeholder="write the room" required>
                </div>
                <div class="p-2">
                    <label for="">Doctor Image : </label>
                    <input type="file" name="file" required>
                </div>
                <div class="p-2">
                    <input type="submit" class="btn btn-success" required>
                </div>
            </form>
        </div>
    </div>
</main>
