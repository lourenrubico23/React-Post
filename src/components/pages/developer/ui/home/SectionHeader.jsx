import React from 'react'
import { LuChevronsRight } from 'react-icons/lu'
import { Link } from 'react-router-dom'

const SectionHeader = ({title="Trending", hasLink=false}) => {
  return (
    <div className='flex justify-between items-center'>
      <h3 className='text-2xl pl-3 p-1 border-l-[8px] border-accent'>{title}</h3>
      {hasLink && <Link to="#" className='btn btn-transparent'>View More<LuChevronsRight /></Link>}
      
    </div>
  )
}

export default SectionHeader
