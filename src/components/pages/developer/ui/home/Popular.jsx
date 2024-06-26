import React from 'react'
import { baseImgUrl, devBaseImgUrl } from '../../../../helpers/functions-general'
import SectionHeader from './SectionHeader'
import useQueryData from '../../../../custom-hooks/useQueryData';

const Popular = () => {

    const {
        isLoading,
        isFetching,
        error,
        data: popular,
      } = useQueryData(
         "/v1/popular", // endpoint
         "get", // method
        "popular", // key
      );

  return (
    <section className='popular py-10'>
       <div className="container">
            <SectionHeader title='Popular Category' hasLink={true} link='/popular'/>
            <div className='grid mt-10 gap-10 md:grid md:grid-cols-4 md:gap-10'>
                {!isLoading && popular?.data.map((item, key) => (
                  <div className='flex flex-col gap-10 ' key={key}>
                    <div className="shadow-[4px_2px_10px_5px_rgba(0,0,0,0.1)]  p-5 rounded-2xl">
                        <div className='overflow-hidden rounded-xl h-[250px] mb-5 -mt-10'>
                        <img src={`${devBaseImgUrl}/${item.popular_image}`} alt="" className="w-full object-cover h-[300px] block transition-transform hover:scale-110" />
                        </div>           
                        <h3 className='my-4 text-center font-thicker'>{item.popular_title}</h3>
                    </div>
                </div>  
                ))}
                            
            </div> 
        </div> 
    </section>
  )
}

export default Popular
