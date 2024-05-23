import React from 'react'
import { LiaEdit, LiaHistorySolid, LiaTrashAltSolid } from 'react-icons/lia'
import { PiArchive } from 'react-icons/pi'
import NoData from '../../../../partials/NoData'
import TableLoader from '../../../../partials/TableLoader'
import SpinnerFetching from '../../../../partials/spinners/SpinnerFetching'
import ModalConfirm from '../../../../partials/modals/ModalConfirm'
import ModalDelete from '../../../../partials/modals/ModalDelete'
import { setIsActive, setIsAdd, setIsDelete } from '../../../../../store/StoreAction'
import { StoreContext } from '../../../../../store/StoreContext'

const PopularTable = ({isLoading, isFetching, popular, setItemEdit}) => {
    const {store, dispatch} = React.useContext(StoreContext) 
    const [isArchiving, setIsArchiving] = React.useState(0)
    const [id, setId] = React.useState('')
    let counter= 1;


    const handleEdit = (item) => {
        dispatch(setIsAdd(true))
        setItemEdit(item)  
    }

    const handleActive = (item) => { // for Archive button
        dispatch(setIsActive(true))
        setId(item.popular_aid)
        setIsArchiving(0)
    }

    const handleRestore = (item) => { //for Restore button
        dispatch(setIsActive(true))
        setId(item.popular_aid)
        setIsArchiving(1)
    
    }
    const handleDelete = (item) => { //for Delete button
        dispatch(setIsDelete(true))
        setId(item.popular_aid)
       
    }

    

  return (
    <>
    <div className="table-wrapper relative">
        {isFetching && <SpinnerFetching/>}
                        <table>
                            <thead>
                                <tr>
                                    <th className='w-[20px]'>#</th>
                                    <th className='w-[100px]'>Title</th>
                                    <th className='w-[80px]'>Category</th>
                                    <th className='w-[80px]'>Image</th>
                                    <th className='w-[80px]'>Author</th>
                                    <th className='w-[100px]'>Article</th>
                                    <th className='w-[80px]'>Publish</th>
                                    <th className='w-[100px]'>Action</th>
                                </tr>
                            </thead>
                            <tbody >
                            {isLoading && ( 
                                <tr >
                                    <td colSpan={9}>
                                        <TableLoader count="20" cols="4"/>
                                    </td>
                                </tr>)
                                }

                                {popular?.data.length === 0 && (
                                    <tr>
                                        <td colSpan={9}>
                                            <NoData/>
                                        </td>
                                    </tr>
                                )}
                            
                                    {popular?.data.map((item, key) => (
                                        <tr className='hover:bg-accent/10' key={key}>
                                            <td>{counter++}</td>
                                            <td>{item.popular_title}</td>
                                            <td>{item.popular_category}</td>
                                            <td>{item.popular_image}</td>
                                            <td>{item.popular_author}</td>
                                            <td>{item.popular_article}</td>
                                            <td>{item.popular_publish_date}</td>
                                            <td className='table-action'>
                                            <ul>
                                                {item.popular_is_active ? (
                                                    <>
                                                        <li><button className="tooltip" data-tooltip="Edit" onClick={() => handleEdit(item)}><LiaEdit/></button></li>
                                                        <li><button className="tooltip" data-tooltip="Archive" onClick={() => handleActive(item)} ><PiArchive /></button></li>
                                                    </>
                                                ) : (
                                                    <>
                                                    <li><button className="tooltip" data-tooltip="Restore" onClick={() => handleRestore(item)}><LiaHistorySolid/></button></li>
                                                    <li><button className="tooltip" data-tooltip="Delete" onClick={() => handleDelete(item)} ><LiaTrashAltSolid/></button></li></>
                                                )}
                                            </ul>
                                            </td>
                                        </tr>
                                    ))}
                                        
                                 
                            </tbody>
                        </table>
                    </div>
                    {store.isActive && <ModalConfirm position="center" queryKey="popular" endpoint={`/v1/popular/active/${id}`} isArchiving={isArchiving} />}

                    {store.isDelete && <ModalDelete position="center" queryKey="popular" endpoint={`/v1/popular/${id}`} />}
                    
                    
</>
  )
}

export default PopularTable
