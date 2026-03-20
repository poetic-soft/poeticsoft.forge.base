export default (props) => {
    const SectionField = window.poeticsoft_heart.comps.SectionField;
    const sections = props.data;

    const onChange = (value) => {
        console.log(value);
    };

    const errorMsg = 'Error kkksss';

    return (
        <div className="Dashboard aiagent">
            {sections.map((section) => (
                <SectionField
                    item={section}
                    onChange={onChange}
                    errorMsg={errorMsg}
                />
            ))}
        </div>
    );
};
