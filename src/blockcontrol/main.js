const { 
  createHigherOrderComponent 
} = wp.compose;
const { addFilter } = wp.hooks;
import './main.scss' 

import CorePostContent from './core/post-content'
import CorePostTitle from './core/post-title'

const withInspectorControls = createHigherOrderComponent(  
  BlockEdit => {

    return ( props ) => <>
      <BlockEdit { ...props } />
      {
        props.name === 'core/post-content' &&
        <CorePostContent { ...props } />
      }
      {
        props.name === 'core/post-title' &&
        <CorePostTitle { ...props } />
      }
    </>
  }, 
  'withInspectorControls' 
);

addFilter(
  'editor.BlockEdit',
  'poeticsoft/configs',
  withInspectorControls
);