import { BrowserRouter as Router, Routes, Route } from "react-router-dom"
import Home from "./components/pages/developer/ui/home/Home"
import Single from "./components/pages/developer/ui/single/Single"
import { QueryClient, QueryClientProvider } from "@tanstack/react-query"
import Post from "./components/pages/developer/dashboard/portfolio/Post"

function App() {
  const queryClient = new QueryClient

  return (
    <>
     <QueryClientProvider client={queryClient}>
        <Router>
          <Routes>
            <Route path="/home" element={<Home/>}/>
            <Route path="/single" element={<Single/>}/>
            <Route path="/dashboard/post" element={<Post/>}/>
          </Routes>
        </Router>
      </QueryClientProvider>
    </>
  )
}

export default App
