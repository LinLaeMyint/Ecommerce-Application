import React from 'react'
import reactDom from 'react-dom/client'

const App=()=>
 <h1>Hello this is react component</h1>

reactDom.createRoot(document.getElementById("root")).render(<App />);
