import axios from 'axios'
import React from 'react'
import { useState } from 'react'
import { useEffect } from 'react'
import Loader from '../Component/Loader'

const Order = () => {
    const [order,setOrder]=useState({});
    const [orderarray,setOrderArray]=useState([]);
    const [loader,setLoader]=useState(true);
    const [page,setPage]=useState(1);
    useEffect(()=>{
        axios.get("/api/order").then(({data})=>{
            setOrder(data);
            setOrderArray(data.data);
            setLoader(false);
        });
    },[]);
    const nextPage=()=>{
        const newPage=page+1;
        setPage(newPage);
        axios.get("/api/order?page="+newPage).then(({data})=>{
            setOrder(data);
            setOrderArray(data.data);
            setLoader(false);
        })
    }
    const prevPage=()=>{
        const newPage=page-1;
        setPage(newPage);
        axios.get("/api/order?page="+newPage).then(({data})=>{
            setOrder(data);
            setOrderArray(data.data);
            setLoader(false);
        })
    }
  return (
    <>
    {loader && <Loader />}
    {!loader && (
        <>
         <div className='card p-3'>
         <div className='card-header'>
             <h3>Order History</h3>
         </div>
         <div className='card-body'>
            <table className='table table-striped'>
                 <thead>
                     <tr>
                         <th>Image</th>
                         <th>Name</th>
                         <th>Qty</th>
                         <th>Status</th>
                     </tr>
                 </thead>
                 <tbody>
                    {orderarray.map((d)=>(
                         <tr key={d.id}>
                         <td><img src={d.product.image_url} className="img-thumbnail" width={70} /></td>
                         <td>{d.product.name}</td>
                         <td>{d.total_quantity}</td>
                         <td>
                            {d.status === 'success' && (
                                <span className='badge badge-success'>{d.status}</span>
                            )}
                            {d.status === 'reject' && (
                                <span className='badge badge-danger'>{d.status}</span>
                            )}
                            {d.status === 'pending' && (
                                <span className='badge badge-warning'>{d.status}</span>
                            )}
                        </td>
                     </tr>
                    ))}

                 </tbody>
            </table>
         </div>
         <div>
             <button className='btn btn-sm btn-primary' disabled={order.prev_page_url===null ? true : false} onClick={()=>prevPage()}>Previous</button>
             {/* {order.links.map((d,index)=>(
                <button key={index} className='btn btn-sm btn-primary'>{d.label}</button>
             ))} */}
             <button className='btn btn-sm btn-primary' disabled={order.next_page_url===null ? true : false} onClick={()=>nextPage()}>Next</button>
         </div>
     </div>
     </>
    )}

    </>
  )
}

export default Order
