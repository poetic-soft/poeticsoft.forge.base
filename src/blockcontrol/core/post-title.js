const { 
  InspectorControls
} = wp.blockEditor;
const { 
  PanelBody
} = wp.components;

export default props => {

  const { 
    attributes, 
    setAttributes 
  } = props;
  const {
    control_text
  } = attributes

  return <InspectorControls>
    <PanelBody 
      title="Controles de bloque" 
      initialOpen={ true }
    >        
      { control_text }
    </PanelBody>
  </InspectorControls>
}