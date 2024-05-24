import React from 'react'
import { AiOutlineDatabase, AiOutlineMessage } from 'react-icons/ai'
import { CiFileOn } from 'react-icons/ci'
import { FaRegFile, FaTiktok } from 'react-icons/fa'
import { HiOutlineCalendar, HiOutlineChartBar } from 'react-icons/hi'
import { IoSettingsOutline } from 'react-icons/io5'
import { RxDashboard } from 'react-icons/rx'
import { Link } from 'react-router-dom'
import Logo from './svg/Logo'
import { baseImgUrl } from '../helpers/functions-general'
import { LuTrendingUp } from 'react-icons/lu'
import { MdOutlineFeaturedPlayList } from 'react-icons/md'
import { BsFileBarGraph } from 'react-icons/bs'
import { PiCoatHangerBold } from 'react-icons/pi'

const Navigation = () => {
  return (
    <aside className='px-4 py-6 w-[290px] h-screen border-r border-line'>
        <div className='flex items-center gap-10'>
        <img src={`${baseImgUrl}/logo.png`} alt="" className='w-[150px]'/>
          
        </div>
        

        <ul className='dashboard-nav'>
            <li className='tab-link'><Link to="/dashboard/trending" className='flex items-center gap-2'><LuTrendingUp />Trending</Link></li>
            <li className='tab-link'><Link to="/dashboard/feature" className='flex items-center gap-2'><MdOutlineFeaturedPlayList />Feature</Link></li>
            <li className='tab-link'><Link to="/dashboard/fashion" className='flex items-center gap-2'><PiCoatHangerBold />Fashion & Style</Link></li>
            <li className='tab-link'><Link to="/dashboard/popular" className='flex items-center gap-2'><BsFileBarGraph />Popular Category</Link></li>
            <li className='tab-link'><Link to="/dashboard/category" className='flex items-center gap-2'><BsFileBarGraph />Category</Link></li>
        </ul>

    </aside>
  )
}

export default Navigation
