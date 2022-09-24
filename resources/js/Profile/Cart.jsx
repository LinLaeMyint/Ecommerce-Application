import axios from 'axios';
import React from 'react'
import { useState } from 'react';
import { useEffect } from 'react';
import Loader from '../Component/Loader'


const Cart = () => {
    const [loader,setLoader]=useState(true);
    const [cart,setCart]=useState([]);
    const [payment,setPayment]=useState('');
    const [address,setAddress]=useState('');
    const [phone,setPhone]=useState();
    useEffect(()=>{
        axios.get("/api/cart").then((d)=>{
            const dbCart=d.data;
            setCart(dbCart);
            setLoader(false);
        });
    },[]);
const totalprice=()=>{
    var price=0;

    if(!loader){
        cart.map(item=>{
            price+=item.product.sell_price*item.total_quantity
        })
    }
    return price;



};
const addCart=(id)=>{
    const newCart=cart.map(d=>{
        if(d.id===id){
            d.total_quantity+=1;
        }
        return d;
    });
setCart(newCart);
}
const reduceCart=(id)=>{
    const reduce=cart.map(d=>{
        if(d.id===id){
            d.total_quantity-=1;
        }
        return d;
    })
    setCart(reduce);
}
const saveCart=(id,totalQty)=>{
    axios.post("/api/change-cart/"+id,{totalQty}).then(d=>{
        const data=d.data;
        if(data==='success'){
            showToast('Cart Quantity Updated');
        }
    })

}
const makeOrder=()=>{
   var frmData=new FormData();
    frmData.append("address",address);
    frmData.append("payment",payment);
    frmData.append("phone",phone);
    axios.post("/api/make-order",frmData).then((d)=>{
        const data=d.data;
        if(data==='success'){
            setCart([]);
            setAddress('');
            setPhone();
            setPayment('');
            showToast('Your Order is Success!')
        }
    });

};
  return (
    <>
     <div className="card p-3">
        <div className="card-body">

           {loader && <Loader/>}
            {!loader && (

                <>
                    <h2>Cart List</h2>
            <table className='table table-striped'>
                <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Cart Qty</th>
                    <th>Unit Price</th>
                    <th>Add/Reduce</th>
                    <th>Total Price</th>
                </thead>
                <tbody>
                    {cart.map(c=>(

                        <tr key={c.id}>
                        <td><img width={100} src={c.product.image_url} alt={c.product.name} /></td>
                        <td>{c.product.name}</td>
                        <td>{c.total_quantity}</td>
                        <td>{c.product.sell_price} KS</td>
                        <td>
                            <button className='btn btn-sm btn-success' onClick={()=>addCart(c.id)}>+</button>
                            <input type="number" value={c.total_quantity} disabled />
                            <button className='btn btn-sm btn-danger' onClick={()=>reduceCart(c.id)}>-</button>
                            <button className='btn btn-sm btn-dark' onClick={()=>saveCart(c.id,c.total_quantity)}>Save</button>
                        </td>

                        <td>{c.product.sell_price*c.total_quantity} KS</td>

                    </tr>
                    ))}

                    <tr>
                        <td colSpan={5}>Total Price</td>

                        <td>{totalprice()} KS</td>


                    </tr>
                </tbody>
            </table>
            <div className='card'>
                <div className='card-header'>
                    <h3>Order Now</h3>
                </div>
                <div className='card-body'>
                <div className='form-group'>
                <label htmlFor="">Enter Payment Address</label>
                    <input value={payment} onChange={(e)=>setPayment(e.target.value)} type="text" className='form-control' />
                </div>
                <div className='form-group'>
                    <label htmlFor="">Enter Current Address</label>
                    <textarea value={address} onChange={(e)=>setAddress(e.target.value)} className='form-control' ></textarea>
                </div>
                <div className='form-group'>
                <label htmlFor="">Enter Phone</label>
                    <input type="number" value={phone} onChange={(e)=>setPhone(e.target.value)} className='form-control'/>
                </div>
                <button onClick={()=>makeOrder()} className='btn btn-dark'>Order</button>

                </div>
            </div>
                </>
            )}

        </div>
    </div>
    </>
  )
}

export default Cart;
