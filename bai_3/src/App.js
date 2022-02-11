
import './App.css';
import React from "react";
import useFetch from './hooks/userFetch';
import { styled } from '@mui/material/styles';
import Table from '@mui/material/Table';
import TableBody from '@mui/material/TableBody';
import TableCell, { tableCellClasses } from '@mui/material/TableCell';
import TableContainer from '@mui/material/TableContainer';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import Paper from '@mui/material/Paper';

const StyledTableCell = styled(TableCell)(({ theme }) => ({
    [`&.${tableCellClasses.head}`]: {
        backgroundColor: theme.palette.common.black,
        color: theme.palette.common.white,
    },
    [`&.${tableCellClasses.body}`]: {
        fontSize: 14,
    },
}));

const StyledTableRow = styled(TableRow)(({ theme }) => ({
    '&:nth-of-type(odd)': {
        backgroundColor: theme.palette.action.hover,
    },
    // hide last border
    '&:last-child td, &:last-child th': {
        border: 0,
    },
}));

function App() {
    const { data, loading, error } = useFetch('https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest');
    if (error) console.log(error);
    if (loading) return <h1>Loading...</h1>
    return (
        <div className="App">
            <TableContainer component={Paper}>
                <h1>Coinmarketcap</h1>
                <Table sx={{ minWidth: 700 }} aria-label="customized table">
                    <TableHead>
                        <TableRow>
                            <StyledTableCell>Name</StyledTableCell>
                            <StyledTableCell>Symbol</StyledTableCell>
                            <StyledTableCell>Slug</StyledTableCell>
                            <StyledTableCell>Num_market_pairs</StyledTableCell>

                        </TableRow>
                    </TableHead>
                    <TableBody>
                        {data.map((row) => (
                            <StyledTableRow key={row.id}>
                                <StyledTableCell component="th" scope="row">
                                    {row.name}
                                </StyledTableCell>
                                <StyledTableCell>{row.symbol}</StyledTableCell>
                                <StyledTableCell>{row.slug}</StyledTableCell>
                                <StyledTableCell>{row.num_market_pairs}</StyledTableCell>

                            </StyledTableRow>
                        ))}
                    </TableBody>
                </Table>
            </TableContainer>
        </div>
    );

}

export default App;