import { registerFormatType, toggleFormat } from '@wordpress/rich-text';
import { RichTextToolbarButton } from '@wordpress/block-editor';

const ScreenReaderTextButton = ( { isActive, onChange, value } ) => {
    return (
        <RichTextToolbarButton
            icon="visibility"
            title="Screen Reader Text"
            onClick={ () => {
                onChange(
                    toggleFormat( value, {
                        type: 'ltic-block-a11y/screen-reader-text',
                    } )
                );
            } }
            isActive={ isActive }
        />
    );
};

registerFormatType( 'ltic-block-a11y/screen-reader-text', {
    title: 'Screen Reader Text',
    tagName: 'span',
    className: 'ltic-screen-reader-text',
    edit: ScreenReaderTextButton,
} );