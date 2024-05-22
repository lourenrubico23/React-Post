import React from 'react'
import { FaDotCircle } from 'react-icons/fa'
import { GoDotFill } from 'react-icons/go'

const BannerSlider = () => {
  return (
    <div className='banner-slider'>
        <div className='relative flex justify-center items-center h-[50vh]'>
            <img src="https://via.placeholder.com/800x600" alt="" className='object-cover h-[50vh] w-full absolute top-0 left-0 -z-[1]'/> 
            <div className='text-center'>
                <ul className='flex justify-center gap-2'>
                    <li className='bg-lightgray px-4 py-1 rounded-full text-lightcolor font-thick text-sm'>Travel</li>
                    <li className='bg-lightgray px-4 py-1 rounded-full text-lightcolor font-thick text-sm'>Travel</li>
                </ul>
                <h2 className='px-1 mt-4 text-balance text-3xl text-lightcolor'>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h2>
                <ul className='flex justify-center gap-4 text-sm text-primary items-center'>
                    <li>Louren Rubico</li>
                    <li className='text-[.5rem] text-accent'><GoDotFill/></li>
                    <li>May 22, 2024</li>
                </ul>
            </div> 
            
        </div>
        
        
    </div>
  )
}

export default BannerSlider
