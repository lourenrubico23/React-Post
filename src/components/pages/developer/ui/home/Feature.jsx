import React from 'react'
import Card from './Card'
import SectionHeader from './SectionHeader'
import useQueryData from '../../../../custom-hooks/useQueryData';

const Feature = () => {

  const {
    isLoading,
    isFetching,
    error,
    data: feature,
  } = useQueryData(
     "/v1/feature", // endpoint
     "get", // method
    "feature", // key
  );

  return (
    <section className='feature py-10'>
       <div className="container">
            <SectionHeader title='Feature Now' hasLink={true} link='/feature'/>
            <div className='grid mt-10 gap-10 md:grid md:grid-cols-3 md:gap-10'>
                <Card height='sm'/>
                <Card height='sm'/>
                <Card height='sm'/>
                <Card height='sm'/>
                <Card height='sm'/>
                <Card height='sm'/>
            </div> 
        </div> 
    </section>
    
   
  )
}

export default Feature
