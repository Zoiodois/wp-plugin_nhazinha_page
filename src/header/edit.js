import { useBlockProps} from "@wordpress/block-editor"

export default function Edit(){
    
    const blockProps = useBlockProps()
    
    return(

        <div {...blockProps}>

        <div>Hello I am de Headeer</div>
    </div>
    )
}