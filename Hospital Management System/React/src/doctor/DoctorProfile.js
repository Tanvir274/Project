import React,{useEffect, useState} from "react";
import {Link} from "react-router-dom";
import axios from 'axios';

const Profile=()=>{
    
    const[profiles,setProfile]=useState([]);
    let object=JSON.parse( localStorage.getItem('user'));
    let username = object.username;
    //console.log(username);
    useEffect(()=>{
        var obj ={username:{username}};
        axios.post("/DoctorProfile",obj)
        .then(resp=>{
            //console.log(resp);
            //console.log(resp.data[0]);
            setProfile(resp.data);
            

        })
        .catch(err=>{
            console.log(err);
        })

    },[]);
    return(

  <div>
    <br/><br/><br/><h1>Your Profile</h1><br/><br/>      
    <table align='center' border= '1px solid black' border-radius= '10px'>
    <thead>    
      <tr>
          <td>Name</td>
          <td>Username</td>
          <td>Password</td>
          <td>Phone</td>
          <td>Email</td>
          <td>Blood Group</td>
          <td>Dath of Birth</td>
          <td>Address</td>
          <td>Edit</td>
      </tr>
    </thead>
    <tbody>
    {
        
            <tr>
               <td>{profiles.doc_name}</td>
               <td>{profiles.username}</td>
               <td>{profiles.password}</td>
               <td>{profiles.phone}</td>
               <td>{profiles.email}</td>
               <td>{profiles.group}</td>
               <td>{profiles.dob}</td>
               <td>{profiles.address}</td>
               <td><Link to={`/EditDoctorProfile/${profiles.username}/${profiles.name}/${profiles.password}/${profiles.phone}/${profiles.address}`}>Edit</Link></td>    
         </tr>

          
    }
    </tbody>     
    </table>
  </div>  
    )
}
export default Profile;