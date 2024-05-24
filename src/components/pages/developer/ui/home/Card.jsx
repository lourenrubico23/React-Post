import React from 'react'
import { GoDotFill } from 'react-icons/go'
import { baseImgUrl, devBaseImgUrl } from '../../../../helpers/functions-general'

const Card = ({height="lg", item}) => {
    
  return (
    <div className="card__lg shadow-[4px_2px_10px_5px_rgba(0,0,0,0.1)]  p-5 rounded-2xl">
        <div className={`overflow-hidden rounded-xl mb-5 -mt-10 ${height === "lg" ? "h-[500px]" : "h-[300px]" }`}>
            <img src={`${devBaseImgUrl}/${item?.post_image}`} alt="" className={`w-full object-cover rounded-xl  h-full overflow-hidden  hover:scale-110 transition-transform`}/>
        </div>
        
        <small className='bg-lightgray px-4 py-1 rounded-full text-lightcolor font-thick text-sm'>{item?.category_title}</small>
        <h3 className='my-4'>{item?.post_title}</h3>
        <p className='line-clamp-3 text-balance'>{item?.post_article}</p>

        <div className='flex justify-between mt-4'>
            <div className='flex justify-between items-center gap-5'>
                <div>
                    <img src="http://via.placeholder.com/50x50" alt="" className='rounded-full' />
                </div>
                
                <ul className='flex justify-center gap-4 text-sm text-lightgray items-center'>
                    <li>Louren Rubico</li>
                    <li className='text-[.5rem] text-accent'><GoDotFill/></li>
                    <li>May 22, 2024</li>
                </ul>
                
            </div>
        </div>
    </div>
  )
}

export default Card
