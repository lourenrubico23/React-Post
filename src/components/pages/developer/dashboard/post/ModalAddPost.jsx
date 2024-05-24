import React from 'react'
import { LiaTimesSolid } from 'react-icons/lia'
import { Formik, Form } from 'formik'
import * as Yup from 'yup'
import { useMutation, useQueryClient } from '@tanstack/react-query'
import ModalWrapper from '../../../../partials/modals/ModalWrapper'
import { InputFileUpload, InputText, InputTextArea } from '../../../../helpers/FormInputs'
import SpinnerButton from '../../../../partials/spinners/SpinnerButton'
import { setError, setIsAdd, setMessage, setSuccess } from '../../../../../store/StoreAction'
import { StoreContext } from '../../../../../store/StoreContext'
import { queryData } from '../../../../helpers/queryData'
import useUploadPhoto from '../../../../custom-hooks/useUploadPhoto'
import { devBaseImgUrl } from '../../../../helpers/functions-general'


const ModalAddPost = ({itemEdit, position}) => {
    const {store, dispatch} = React.useContext(StoreContext)

    const handleClose = () => dispatch(setIsAdd(false))

    const { uploadPhoto, handleChangePhoto, photo } = useUploadPhoto(
        `/v1/upload/photo`,
        dispatch
      );

    const queryClient = useQueryClient();
    const mutation = useMutation({
        mutationFn: (values) =>
        queryData(
            itemEdit ? `/v1/post/${itemEdit.post_aid}` : `/v1/post`,
            itemEdit ? "put" : "post",
            values
        ),
        // ;

        onSuccess: (data) => {
        queryClient.invalidateQueries({ queryKey: ["post"] });
        if (data.success) {
            dispatch(setIsAdd(false));
            dispatch(setSuccess(true));
            dispatch(setMessage(`Successfuly updated.`));
        } else {
            dispatch(setError(true));
            dispatch(setMessage(data.error));
        }
      
        },
    });

    const initVal = {
        post_title: itemEdit ? itemEdit.post_title : "",
        post_category: itemEdit ? itemEdit.post_category : "",
        post_image: itemEdit ? itemEdit.post_image : "",
        post_author: itemEdit ? itemEdit.post_author : "",
        post_article: itemEdit ? itemEdit.post_article : "",
        post_publish_date: itemEdit ? itemEdit.post_publish_date : "",
    }

    const yupSchema = Yup.object({
        post_title: Yup.string().required("Required*"),
        post_category: Yup.string().required("Required*"),
        post_author: Yup.string().required("Required*"),
        post_article: Yup.string().required("Required*"),
        post_publish_date: Yup.string().required("Required*"),
    })

  return (
    <ModalWrapper position={position}>
    <div className="main-modal w-[900px] bg-primary text-darkcolor ">
              <div className="modal-header p-4 relative">
                  <h2>New Article</h2>
                  <button className='absolute top-[25px] right-4' onClick={handleClose}><LiaTimesSolid/></button>
              </div>
              <div className="modal-body p-4 ">
                  <Formik
                        initialValues={initVal}
                        validationSchema={yupSchema}
                        onSubmit={async (values) => {
                            uploadPhoto()
                            mutation.mutate({...values, 
                                post_image:
                                (itemEdit && itemEdit.post_image === "") || photo
                                  ? photo === null
                                    ? itemEdit.post_image
                                    : photo.name
                                  : values.post_image,})
                          }}
                  >
                      {(props) => {
                          return (
                      <Form  className='flex flex-col'>
                      <div className='grow overflow-y-auto'>
                        <div className="input-wrap">
                                <InputText
                                    label="Title"
                                    type="text"
                                    name="post_title"
                                />
                            </div>

                        <div className='grid grid-cols-[1fr_2fr] gap-10'>
                            <div className="left">
                                <div className="input-wrap">
                                    {photo || (itemEdit && itemEdit.post_image !== "") ? (
                                    <img src={ photo
                                        ? URL.createObjectURL(photo) // preview
                                        : itemEdit.post_image // check db
                                        ? devBaseImgUrl + "/" + itemEdit.post_image
                                        : null
                                    }
                                    alt="Photo"
                                    className="rounded-tr-md rounded-tl-md h-[200px] max-h-[200px] w-full object-cover object-center m-auto"
                                    />
                                    ) : (
                                    <span className="w-full min-h-[200px] flex items-center justify-center">
                                        <span className="text-accent mr-1 underline">Drag & Drop</span>{" "}
                                        photo here or{" "}
                                        <span className="text-accent ml-1 underline">Browse</span>
                                    </span>
                                    )}

                                    {(photo !== null ||
                                        (itemEdit && itemEdit.post_image !== "")) && (
                                        <span className="min-h-10 flex items-center justify-center">
                                        <span className="text-accent mr-1">Drag & Drop</span>{" "}
                                        photo here or{" "}
                                        <span className="text-accent ml-1">Browse</span>
                                    </span>
                                    )}

                                    {/* <FaUpload className="opacity-100 duration-200 group-hover:opacity-100 fill-dark/70 absolute top-0 right-0 bottom-0 left-0 min-w-[1.2rem] min-h-[1.2rem] max-w-[1.2rem] max-h-[1.2rem] m-auto cursor-pointer" /> */}
                                    <InputFileUpload
                                        name="photo"
                                        type="file"
                                        id="myFile"
                                        accept="image/*"
                                        title="Upload photo"
                                        onChange={(e) => handleChangePhoto(e)}
                                        onDrop={(e) => handleChangePhoto(e)}
                                        className="opacity-0 absolute right-0 bottom-0 left-0 m-auto cursor-pointer h-full "
                                        />
                            </div>
                                
                                <div className="input-wrap">
                                    <InputText
                                        label="Category"
                                        type="text"
                                        name="post_category"
                                    />
                                </div>
                                <div className="input-wrap">
                                    <InputText
                                        label="Image"
                                        type="text"
                                        name="post_image"
                                    />
                                </div>
                                <div className="input-wrap">
                                    <InputText
                                        label="Author"
                                        type="text"
                                        name="post_author"
                                        className='h-[10rem] resize-none'
                                    />
                                </div> 
                                <div className="input-wrap">
                                    <InputText
                                        label="Publish Date"
                                        type="date"
                                        name="post_publish_date"
                                    />
                                </div>
                            </div>

                            <div className="right">
                                <div className="input-wrap">
                                    <InputTextArea
                                        label="Article"
                                        type="text"
                                        name="post_article"
                                        className='h-[29.5rem] resize-none'
                                    />
                                </div>
                            </div>
                        </div>
                          
                      

                      

                      
                      </div>

                      <div className='form-action max-w-[400px] ml-auto w-full'>
                          <button className='btn2 btn-form btn--accent' type="submit"> {mutation.isPending ? <SpinnerButton/> : "Add"}</button>
                          <button className='btn2 btn-form btn--cancel' type="button" onClick={handleClose}>Cancel</button>
                      </div>
                  </Form>)}}
                  
                  </Formik>
              </div>
      </div>
  </ModalWrapper>

  )
}

export default ModalAddPost