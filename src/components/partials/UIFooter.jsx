import React from 'react'
import { FaFacebook, FaInstagram, FaTwitter, FaYoutube } from 'react-icons/fa'
import { Link } from 'react-router-dom'

const UIFooter = () => {
  return (
    <footer className='py-12 pb-6 bg-footerblue text-lightcolor text-center px-2 mt-5'>
      <h2 className='text-lightcolor text-5xl'>BLOG</h2>
      <h4 className='text-2xl'>Subscribe to our news letter</h4>
      <p>Be the first to get notified about new posts subscribe our newsletter.</p>

      <form action="" className='relative max-w-[700px] mx-auto my-5'>
        <input type="text" className='p-4 rounded-xl placeholder:opacity-60 w-full' placeholder='Your Email Address' />
        <button className='btn btn-accent absolute top-2 right-1 '>Subscribe</button>
      </form>

      <ul className='flex justify-center gap-4 text-xl'>
        <li><Link><FaFacebook/></Link></li>
        <li><Link><FaTwitter/></Link></li>
        <li><Link><FaInstagram/></Link></li>
        <li><Link><FaYoutube/></Link></li>
      </ul>

      <div className="mt-6 pt-5 border-t border-line border-lightgray">
        <p className='mb-0'>© Copyright 2024 Bloge All rights reserved.</p>
      </div>

    </footer>
  )
}

export default UIFooter
