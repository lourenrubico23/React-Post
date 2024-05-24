import React from 'react'
import UIHeader from '../../../../partials/UIHeader'
import UIFooter from '../../../../partials/UIFooter'
import { baseImgUrl, devBaseImgUrl, getUrlParam } from '../../../../helpers/functions-general'
import { GoDotFill } from 'react-icons/go'
import { Link } from 'react-router-dom'
import { FaFacebook, FaInstagram, FaTwitter, FaYoutube } from 'react-icons/fa'
import { CiClock2 } from 'react-icons/ci'
import useQueryData from '../../../../custom-hooks/useQueryData'
import Markdown from 'react-markdown'

const Single = ({height="lg"}) => {
    const id = getUrlParam().get('id')

    const {
        isLoading,
        isFetching,
        error,
        data: post,
      } = useQueryData (
       `/v1/post/${id}`, // endpoint
       "get", // method
       "post", // key
      );

      console.log(post)



  return (
    <>
      <UIHeader/>
      <div className='banner mt-5 mb-10'>
            <div className="container">
                <h1 className='max-w-[800px] text-center mx-auto bg-footerblue px-5 py-10 bg-opacity-10 rounded-lg border-2 border-footerblue border-opacity-40 mb-0'>{post?.data[0].post_title}</h1>
            </div> 
      </div>

    <div className="container">
        <div className='grid md:grid-cols-[2fr_1fr] my-[100px] gap-10'>
            <article className='shadow-[4px_2px_10px_5px_rgba(0,0,0,0.1)]  p-5 rounded-2xl '>
                <div className={`overflow-hidden rounded-xl mb-5 -mt-10 ${height === "lg" ? "h-[500px]" : "h-[300px]" }`}>
                    <img src={`${devBaseImgUrl}/${post?.data[0].post_image}`} alt="" className='mb-5 w-full h-[500px] object-cover rounded-xl  overflow-hidden  hover:scale-110 transition-transform' />
                </div>
                <small className='bg-lightgray px-4 py-1 rounded-full text-lightcolor font-thick text-sm'>{post?.data[0].post_category}</small>
                <div className='flex justify-between'>
                    <div className='flex justify-between items-center gap-5 my-5'>
                        <div>
                            <img src="http://via.placeholder.com/50x50" alt="" className='rounded-full' />
                        </div>
                        
                        <ul className='flex justify-center gap-4 text-sm text-lightgray items-center'>
                            <li>{post?.data[0].post_author}</li>
                            <li className='text-[.5rem] text-accent'><GoDotFill/></li>
                            <li>{post?.data[0].post_publish_date}</li>
                            <li className='text-[.5rem] text-accent'><GoDotFill/></li>
                            <li>05 Comment</li>
                        </ul>
                        
                    </div>
                </div>
                <h2>{post?.data[0].post_title}</h2>
                <Markdown>
                    {post?.data[0].post_article}
                </Markdown>
                <h2>{post?.data[0].post_title}</h2>
                <Markdown>
                    {post?.data[0].post_article}
                </Markdown>
                <img src={`${baseImgUrl}/2.jpg`} alt="" className='mb-5 w-full h-[500px] object-cover rounded-md' />
            </article>

            <aside>
                <div className='sticky top-4'>
                    <div className='shadow-[4px_2px_10px_5px_rgba(0,0,0,0.1)]  p-5 rounded-2xl  text-center mb-10'>
                        <img src={`${baseImgUrl}/1.jpg`} alt="" className='rounded-full size-[8rem] object-cover mx-auto my-5' />
                        <h2>Johnny T Hale</h2>
                        <p className='my-5'>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                        <ul className='flex justify-center gap-4 text-xl'>
                            <li><Link><FaFacebook/></Link></li>
                            <li><Link><FaTwitter/></Link></li>
                            <li><Link><FaInstagram/></Link></li>
                            <li><Link><FaYoutube/></Link></li>
                        </ul>
                    </div>

                    <div className='shadow-[4px_2px_10px_5px_rgba(0,0,0,0.1)]  p-5 rounded-2xl   mb-10'>
                        <h2>Latest Posts</h2>
                        <div className="grid grid-cols-[100px_1fr] gap-3 my-2">
                            <div className='overflow-hidden'>
                                <img src={`${baseImgUrl}/1.jpg`} alt="" className='rounded-md h-full w-full object-cover overflow-hidden hover:scale-110 transition-transform' />
                            </div>
                            <div className='my-2'>
                                <h4 className='mb-0'>This Is My Favourite Fashion Style</h4>
                                <small className='flex items-center gap-3'><CiClock2 className='text-accent text-lg' />February 28, 2021</small>
                            </div>

                            <div className='overflow-hidden'>
                                <img src={`${baseImgUrl}/2.jpg`} alt="" className='rounded-md h-full w-full object-cover overflow-hidden hover:scale-110 transition-transform' />
                            </div>
                            <div className='my-2'>
                                <h4 className='mb-0'>Great Holiday Enjoy With The Sea</h4>
                                <small className='flex items-center gap-3'><CiClock2 className='text-accent text-lg' />February 28, 2021</small>
                            </div>

                            <div className='overflow-hidden'>
                                <img src={`${baseImgUrl}/3.jpg`} alt="" className='rounded-md h-full w-full object-cover overflow-hidden hover:scale-110 transition-transform' />
                            </div>
                            <div className='my-2'>
                                <h4 className='mb-0'>The Dress Style Wearing Right Now</h4>
                                <small className='flex items-center gap-3'><CiClock2 className='text-accent text-lg' />February 28, 2021</small>
                            </div>

                            <div className='overflow-hidden'>
                                <img src={`${baseImgUrl}/4.jpg`} alt="" className='rounded-md h-full w-full object-cover overflow-hidden hover:scale-110 transition-transform' />
                            </div>
                            <div className='my-2'>
                                <h4 className='mb-0'>Enjoy Work And Do What Ever You Want</h4>
                                <small className='flex items-center gap-3'><CiClock2 className='text-accent text-lg' />February 28, 2021</small>
                            </div>
                        </div>
                    </div>
                </div>
                
            </aside>
        </div>
    </div>
        
      <UIFooter/>
    </>
  )
}

export default Single
