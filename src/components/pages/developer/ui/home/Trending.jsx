import React from 'react'
import SectionHeader from './SectionHeader'
import { GoDotFill } from 'react-icons/go'
import Card from './Card'
import { baseImgUrl, devBaseImgUrl } from '../../../../helpers/functions-general'
import useQueryData from '../../../../custom-hooks/useQueryData'
import Markdown from 'react-markdown'
import { Link } from 'react-router-dom'

const Trending = () => {

    const {
        isLoading,
        isFetching,
        error,
        data: post,
      } = useQueryData(
         "/v1/post", // endpoint
         "get", // method
        "post", // key
      );

  return (
    <section className='py-10'>
        <div className="container">
            <SectionHeader/>
            <div className="grid mt-10 gap-10 md:grid-cols-[1fr_2fr]">
                <Card/>
                <div className='grid gap-10 md:grid-cols-2'>
                    {!isLoading && post?.data.slice(0, 4).map((item, key) => (
                    <div className="shadow-[4px_2px_10px_5px_rgba(0,0,0,0.1)]  p-5 rounded-2xl" key={key}>
                        <div className='overflow-hidden rounded-xl h-[250px] mb-5 -mt-10'>
                            <Link to={`/single?id=${item.post_aid}`}>
                                <img src={`${devBaseImgUrl}/${item.post_image}`} alt="" className="w-full object-cover h-[300px] block   transition-transform hover:scale-110" />
                            </Link> 
                        </div>
                        <small className='bg-lightgray px-4 py-1 rounded-full text-lightcolor font-thick text-sm'>{item.post_category}</small>
                        <h3 className='mt-4 mb-0'>{item.post_title}</h3>
                        {/* <Markdown>{item.post_article}</Markdown> */}
                    </div>
                    ))}
                
                
                   
                </div>
                
                
            </div>
            
        </div>
    </section>
  )
}

export default Trending
