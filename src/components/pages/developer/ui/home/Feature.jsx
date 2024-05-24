import React from 'react'
import Card from './Card'
import SectionHeader from './SectionHeader'
import useQueryData from '../../../../custom-hooks/useQueryData';

const Feature = () => {

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

  const getFeatured = () => post?.data.filter(item => item.post_category_id === 2)

  return (
    <section className='feature py-10'>
       <div className="container">
            <SectionHeader title='Feature Now' hasLink={true} link='/feature'/>
            <div className='grid mt-10 gap-10 md:grid md:grid-cols-3 md:gap-10'>
              {!isLoading && getFeatured().map((item, key) => (
                <Card height='sm' item={item} key={key}/>
              ))}
                
            </div> 
        </div> 
    </section>
    
   
  )
}

export default Feature
