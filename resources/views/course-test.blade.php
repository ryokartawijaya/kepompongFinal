
@auth
@extends('layout')


@section('container')

    <link rel="stylesheet" href="myCSS/home.css">
    <title>Home</title>

    
    <div class="container">
        <div class="row text-center" id="box">
            <div class="scheduleBox" style="background-color: white; border-radius: 20px;padding: 10px;">
                <h3 style="color: #8816e1">Course List</h3>
                <br><br>

                <table class="table">

                        <thead>
                                            <tr>
                                            <th scope="col">Course ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Teacher</th>
                           
                                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($filteredData as $data)
                                <tr>
                                <td>
                                    <p>{{$data->courseId}}</p>
                                </td>              
                                <td>
                                    <p>{{$data->name}}</p>
                                </td>
                                <td style="width: 400px;">
                                    <p>{{$data->description}}</p>
                                </td>
                                <td>
                                    <p>{{$data->teacher}}</p>
                                </td>
                                <!-- <td><p>{{$data->description}}</p></td> -->

                                            
                                </tr>
                                            
                            @endforeach
                        </tbody>
                    </table>
                

                    
                    
             
                
            </div>   
        
        </div>

        

    </div>
    

    
@endsection

@endauth


@guest
<?php
    // return redirect()->route('login');
    header("Location: login");
    die();
?>
@endguest