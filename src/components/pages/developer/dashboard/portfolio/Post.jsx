import React from 'react'
import { Link } from 'react-router-dom'
import { FiPlus } from 'react-icons/fi'
import Navigation from '../../../../partials/Navigation'
import useQueryData from '../../../../custom-hooks/useQueryData'
import { setIsAdd } from '../../../../../store/StoreAction'
import { StoreContext } from '../../../../../store/StoreContext'
import ModalError from '../../../../partials/modals/ModalError'
import Toast from '../../../../partials/Toast'
import HeaderDashboard from '../header/HeaderDashboard'
import Searchbar from './Searchbar'
import PostTable from './PostTable'
import ModalAddPost from './ModalAddPost'

const Post = () => {
    const {store, dispatch} =React.useContext(StoreContext)
    const [isSearch, setIsSearch] = React.useState(false)
    const [keyword, setKeyword] = React.useState('')
    const [itemEdit, setItemEdit ] = React.useState(null);

    const {
        isLoading,
        isFetching,
        error,
        data: post,
      } = useQueryData(
        isSearch ? "/v1/post/search" : "/v1/post", // endpoint
        isSearch ? "post" : "get", // method
        "post", // key
        {
            searchValue: keyword
        }
      );

      const handleAdd = () => {
        dispatch(setIsAdd(true))
        setItemEdit(null)//for reset of modal from update to add
      }


  return (
    <section className='flex overflow-x-hidden'>
    <Navigation/>
    <main className='w-[calc(100%-250px)]'>
        <HeaderDashboard/>
        <div className='flex relative'>
            <div className='main-wrapper transition-all px-4 py-3 w-full'>
                <div className='flex justify-between items-center'>
                    <h1>Projects</h1>
                    <Searchbar setIsSeach={setIsSearch} setKeyword={setKeyword}/>
                </div>    
            
                <div className='tab flex justify-between items-center mt-8 border-b border-line mb-8'>
                
                        <ul className='flex space-x-10 '>
                            <li className='tab-link'><Link to="/dashboard/projects">Projects</Link></li>
                            <li className='tab-link'><Link to="/dashboard/skills">Skills</Link></li>
                            <li className='tab-link'><Link to="/dashboard/contact">Contact</Link></li>
                            <li className='tab-link'><Link to="/dashboard/homebanner">Home Banner</Link></li>
                            <li className='tab-link'><Link to="/dashboard/aboutbanner">About Banner</Link></li>
                        </ul>
                        
                    
                    <button className='btn btn--accent'  onClick={handleAdd}><FiPlus/>New</button>
                </div>

                <PostTable isLoading={isLoading} post={post} isFetching={isFetching} setItemEdit={setItemEdit}/>
            </div>
            
            
        </div>
    </main>

    {store.isAdd && <ModalAddPost itemEdit={itemEdit}/>}
    {store.error && <ModalError position='center'/>}
    {store.success && <Toast/>}
</section>
  )
}

export default Post
