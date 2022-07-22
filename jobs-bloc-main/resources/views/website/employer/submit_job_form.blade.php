@extends('website.layout')

@section('content')

<div class="container-fluid bg-light">
    <div class="container bg-white">
    
    <form class="p-5">
    
        <div class="row">
    
            <div class="col-6 mb-3">
                <label for="exampleInputEmail1" class="form-label">Job Title</label>
                <input type="text" class="form-control  p-2" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col-6 mb-3">
                <label for="exampleInputEmail1" class="form-label">Types</label>
                <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                </select>
            </div>
    
        </div>
        <div class="row">
    
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
             <textarea class="form-control p-2" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    
        </div>
    
        <div class="row">
    
            <div class="col-6 mb-3">
                    <label for="exampleInputEmail1" class="form-label">Featured Image </label>
                    <input type="file" class="form-control  p-2" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
    
        </div>
    
        <div class="row">
                     <div class="col-6 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Categories</label>
                        <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        </select>
                    </div>
    
                    <div class="col-6 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Application Deadline Date</label>
                        <input type="date" class="form-control  p-2" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    
    
        </div>
    
        <div class="row">
                     <div class="col-6 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Job Apply Type</label>
                        <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        </select>
                    </div>
    
                    <div class="col-6 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Min. Salary</label>
                        <input type="text" class="form-control  p-2" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    
    
        </div>
    
        <div class="row">
    
    
                     <div class="col-6 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Max. Salary</label>
                        <input type="text" class="form-control  p-2" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>  
    
                     <div class="col-6 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Salary Type</label>
                        <select class="form-select  p-2" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        </select>
                    </div>
    
        </div>
    
        <div class="row">
    
    
                     <div class="col-6 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tags</label>
                        <input type="text" class="form-control  p-2" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>  
    
    
        </div>
    
        <div class="row">
                         <div class="col-12 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Location</label>
                        <select class="form-select  p-2" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        </select>
                        </div>  
    
        </div>
        <div class="row">
                         <div class="col-12 mb-3">
                         <label for="exampleFormControlTextarea1" class="form-label">Friendly Address</label>
                          <textarea class="form-control p-2" id="exampleFormControlTextarea1" rows="2"></textarea>
                        </div>  
    
        </div>
    
    
    
    
            <button type="submit" class="btn btn-warning text-white px-3 py-2" > Save & Preview</button>
    </form>
    
    </div>

</div>



@endsection