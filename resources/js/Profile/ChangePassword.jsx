import axios from 'axios';
import React from 'react'
import { useState } from 'react'

const ChangePassword = () => {
    const [newPassword,setNewPassword]=useState("");
    const [currentPassword,setCurrentPassword]=useState("");
    const changePassword=()=>{
        axios.post("/api/change-password",{newPassword,currentPassword}).then((d)=>{
            const data=d.data;
            if(data==="wrong_password"){
                showToast("Invalid Current Password");
            }else{
                showToast("Password Change Successfully");
            }
        });
    };
  return (
    <>
     <div className='card p-3'>
        <div className='card-header'>
        <h3>Change Password</h3>
        </div>
        <div className='card-body'>
            <div className='form-group'>
                <label htmlFor="">Enter Current Password</label>
                <input type="password" onChange={(e)=>setCurrentPassword(e.target.value)} className='form-control' />
            </div>
            <div className='form-group'>
                <label htmlFor="">Enter New Password</label>
                <input type="password" onChange={(e)=>setNewPassword(e.target.value)} className='form-control' />
            </div>
            <button className='btn btn-primary' onClick={()=>changePassword()}>Change</button>
        </div>
    </div>
    </>
  )
}

export default ChangePassword
