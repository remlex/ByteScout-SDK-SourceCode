//*******************************************************************
//       ByteScout PDF SDK		                                     
//                                                                   
//       Copyright © 2016 ByteScout - http://www.bytescout.com       
//       ALL RIGHTS RESERVED                                         
//                                                                   
//*******************************************************************

using System.Diagnostics;
using Bytescout.PDF.Converters;

namespace ConvertDocxToPdf
{
	/// <summary>
	/// This example demonstrates how to convert Microsoft Word DOCX document to PDF document.
	/// </summary>
	class Program
	{
		static void Main()
		{
            // Create converter instance
            using (DocxToPdfConverter converter = new DocxToPdfConverter())
		    {
                // Perform conversion
		        converter.ConvertDocxToPdf("sample.docx", "result.pdf");
		    }

		    // Open result document in default PDF viewer
		    Process.Start("result.pdf");
		}
	}
}
